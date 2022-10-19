<?php

namespace App\Modules\Agency\State;

use App\Modules\Agency\Entity\Agency;
use App\Modules\Common\State\EntityProcessor;
use App\Modules\Common\State\PersistProcessor;
use Symfony\Component\Serializer\SerializerInterface;

class AgencyProcessor
{
    public function __construct(private SerializerInterface $serializer, private EntityProcessor $persistProcessor)
    {
    }

    public function process(mixed $data)
    {
        return $this->persistProcessor->process($data, Agency::class);
    }
}
