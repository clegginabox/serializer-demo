<?php

namespace App\Modules\Common\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute]
class UniqueValueInEntity extends Constraint
{
    public string $message = 'some error message';

    public $entityClass;
    public $entityId;
    public $field;

    public function getRequiredOptions(): array
    {
        return ['entityClass', 'entityId', 'field'];
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
