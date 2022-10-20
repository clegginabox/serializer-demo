<?php

namespace App\Modules\Hcp\Serializer\Normalizer;

use App\Modules\Hcp\Entity\Address;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class AddressNormalizer
{
    public function __construct(private ObjectNormalizer $normalizer)
    {
    }

    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        return $this->normalizer->denormalize($data, $type, $format, $context);
    }

    public function supportsDenormalization($data, string $type, string $format = null, array $context = [])
    {
        return $type === Address::class;
    }
}
