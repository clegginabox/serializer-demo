<?php

namespace App\Modules\Common\Serializer\Normalizer;

use App\Modules\Common\Input\RelationshipInput;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class RelationshipNormalizer implements NormalizerInterface
{
    public function __construct(private ObjectNormalizer $normalizer, private EntityManagerInterface $entityManager)
    {
    }

    /**
     * @inheritDoc
     */
    public function normalize(mixed $object, string $format = null, array $context = [])
    {
        /** @var RelationshipInput $relationshipInput */
        $relationshipInput = $object;

        // Downside of not having entities in one directory
        $fqns = [
            'App\\Modules\\Agency\\Entity',
            'App\\Modules\\Hcp\\Entity'
        ];

        $className = null;

        foreach ($fqns as $fqn) {
            if (class_exists(sprintf('%s\\%s', $fqn, $relationshipInput->getType()))) {
                $className = sprintf('%s\\%s', $fqn, $relationshipInput->getType());
                break;
            }
        }

        if ($className !== null) {
            $entity = $this->entityManager->getRepository($className)
                ->findOneBy(['uuid' => $relationshipInput->getId()]);

            if (!$entity) {
                // handle error / throw exception
            }

            return $this->normalizer->normalize($entity);
        }
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization(mixed $data, string $format = null)
    {
        return $data instanceof RelationshipInput;
    }
}
