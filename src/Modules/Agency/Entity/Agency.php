<?php

namespace App\Modules\Agency\Entity;

use App\Modules\Agency\Repository\AgencyRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

#[ORM\Entity(repositoryClass: AgencyRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ORM\Table('agencies')]
class Agency
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    protected string $uuid;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $deactivationReason = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notes = null;

    #[ORM\ManyToOne(targetEntity: AgencyStatus::class)]
    #[ORM\JoinColumn(name: 'agency_status_id', referencedColumnName: 'id', nullable: false)]
    private AgencyStatus $status;

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
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
     * @return Agency
     */
    public function setName(string $name): Agency
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeactivationReason(): ?string
    {
        return $this->deactivationReason;
    }

    /**
     * @param string|null $deactivationReason
     * @return Agency
     */
    public function setDeactivationReason(?string $deactivationReason): Agency
    {
        $this->deactivationReason = $deactivationReason;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     * @return Agency
     */
    public function setNotes(?string $notes): Agency
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return AgencyStatus
     */
    public function getStatus(): AgencyStatus
    {
        return $this->status;
    }

    /**
     * @param AgencyStatus $status
     * @return Agency
     */
    public function setStatus(AgencyStatus $status): Agency
    {
        $this->status = $status;

        return $this;
    }
}
