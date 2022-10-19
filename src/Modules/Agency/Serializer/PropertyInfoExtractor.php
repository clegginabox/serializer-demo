<?php

namespace App\Modules\Agency\Serializer;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor as SymfonyPropertyInfoExtractor;


class PropertyInfoExtractor extends SymfonyPropertyInfoExtractor
{
    public function __construct()
    {
        parent::__construct([], [new PhpDocExtractor(), new ReflectionExtractor()]);
    }
}
