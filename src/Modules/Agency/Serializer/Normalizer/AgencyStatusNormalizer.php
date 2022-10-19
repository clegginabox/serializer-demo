<?php

namespace App\Modules\Agency\Serializer\Normalizer;

use App\Modules\Agency\Entity\Agency;
use App\Modules\Agency\Entity\AgencyStatus;
use App\Modules\Agency\Repository\AgencyStatusRepository;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class AgencyStatusNormalizer implements DenormalizerInterface
{
    private const ALREADY_CALLED = 'agency_update_already_called';

    public function __construct(private GetSetMethodNormalizer $getSetMethodNormalizer)
    {
    }

    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        if (is_string($data)) {
            return (new AgencyStatus())->setName($data);
        }
    }

    public function supportsDenormalization($data, string $type, string $format = null, array $context = [])
    {
        return $type === AgencyStatus::class;
    }
}
