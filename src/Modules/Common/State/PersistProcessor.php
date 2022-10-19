<?php

namespace App\Modules\Common\State;

use Doctrine\ORM\EntityManagerInterface;

class PersistProcessor
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function process(mixed $data)
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();
        $this->entityManager->refresh($data);

        return $data;
    }
}
