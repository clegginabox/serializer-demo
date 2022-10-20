<?php

namespace App\Modules\Agency\Serializer\Normalizer;

use App\Modules\Agency\Entity\AgencyStatus;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class AgencyStatusNormalizer implements DenormalizerInterface
{
    public function __construct()
    {
    }

    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        if (is_string($data)) {
            // @todo get AgencyStatus from repo
            return (new AgencyStatus())->setName($data);
        }


    }

    public function supportsDenormalization($data, string $type, string $format = null, array $context = [])
    {
        return $type === AgencyStatus::class;
    }
}
