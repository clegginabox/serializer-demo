<?php

namespace App\Modules\Common\Serializer;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class InputSerializer extends Serializer
{
    public function __construct()
    {
        $extractors = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);

        $normalizers = [
            new GetSetMethodNormalizer(null, new CamelCaseToSnakeCaseNameConverter(), $extractors),
            new ArrayDenormalizer(),
        ];

        $encoders = [
            new JsonEncoder(),
        ];

        parent::__construct($normalizers, $encoders);
    }
}
