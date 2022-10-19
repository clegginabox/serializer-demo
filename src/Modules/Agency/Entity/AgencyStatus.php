<?php

namespace App\Modules\Agency\Entity;

use App\Modules\Agency\Repository\AgencyStatusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgencyStatusRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ORM\Table('agencies_statuses')]
class AgencyStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $languageKey;

    #[ORM\Column(type: 'integer')]
    private int $priority;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AgencyStatus
     */
    public function setName(string $name): AgencyStatus
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageKey(): string
    {
        return $this->languageKey;
    }

    /**
     * @param string $languageKey
     * @return AgencyStatus
     */
    public function setLanguageKey(string $languageKey): AgencyStatus
    {
        $this->languageKey = $languageKey;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return AgencyStatus
     */
    public function setPriority(int $priority): AgencyStatus
    {
        $this->priority = $priority;

        return $this;
    }
}
