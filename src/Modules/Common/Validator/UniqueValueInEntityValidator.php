<?php

namespace App\Modules\Common\Validator;

use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueValueInEntityValidator extends ConstraintValidator
{
    private PropertyAccessor $propertyAccessor;

    public function __construct(private EntityManagerInterface $entityManager)
    {
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
    }

    /**
     * @inheritDoc
     */
    public function validate(mixed $value, Constraint $constraint)
    {
        if (!is_string($constraint->field)) {
            throw new InvalidArgumentException('"field" parameter should be a string');
        }

        $entityId = $this->propertyAccessor->getValue($value, $constraint->entityId);
        $fieldValue = $this->propertyAccessor->getValue($value, $constraint->field);

        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('e')
            ->from($constraint->entityClass, 'e')
            ->where(sprintf('e.%s = :field', $constraint->field))
            ->andWhere($queryBuilder->expr()->notIn('e.uuid', $entityId))
            ->setParameter('field', $fieldValue);

        $results = $queryBuilder->getQuery()->getResult();

        if (count($results) > 0) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
