<?php

namespace App\Modules\Hcp\Serializer\Normalizer;

use App\Modules\Hcp\Entity\Hcp;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class HcpNormalizer implements DenormalizerInterface
{
    public function __construct(private ObjectNormalizer $normalizer)
    {
    }

    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        $data['address'] = [
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'city' => $data['city']
        ];

        return $this->normalizer->denormalize($data, $type, $format, $context);
    }

    public function supportsDenormalization($data, string $type, string $format = null, array $context = [])
    {
        return $type === Hcp::class;
    }
}
