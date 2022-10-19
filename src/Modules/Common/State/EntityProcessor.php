<?php

namespace App\Modules\Common\State;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class EntityProcessor
{
    public function __construct(private SerializerInterface $serializer, private PersistProcessor $persistProcessor)
    {
    }

    public function process(mixed $data, string $entityClass, ?object $entityToUpdate = null)
    {
        if ($entityToUpdate !== null) {
            $context = [AbstractNormalizer::OBJECT_TO_POPULATE => $entityToUpdate];
        }

        $entity = $this->serializer->denormalize(
            $this->serializer->normalize($data),
            $entityClass,
            null,
            $context ?? []
        );

        return $this->persistProcessor->process($entity);
    }
}
