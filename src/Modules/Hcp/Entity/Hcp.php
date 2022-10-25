<?php

namespace App\Modules\Hcp\Entity;

use App\Modules\Agency\Entity\Agency;
use App\Modules\Hcp\Entity\Address;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InverseJoinColumn;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Ramsey\Uuid\Doctrine\UuidGenerator;

class Hcp
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    protected string $uuid;

    #[ORM\Column(type: 'string', length: 255)]
    private string $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    private string $lastName;

    #[ORM\Column(type: 'string', length: 255)]
    private string $phoneNumber;

    #[ORM\Column(name: 'email_primary', type: 'string', length: 255)]
    private string $primaryEmail;

    #[ORM\OneToOne(targetEntity: Address::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private Address $address;

    #[JoinTable(name: 'hcp_agencies')]
    #[JoinColumn(referencedColumnName: 'uuid')]
    #[InverseJoinColumn(referencedColumnName: 'uuid')]
    #[ORM\ManyToMany(targetEntity: Agency::class, inversedBy: 'hcps')]
    private Collection $agencies;

    public function __construct()
    {
        $this->agencies = new ArrayCollection();
    }

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
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Hcp
     */
    public function setFirstName(string $firstName): Hcp
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Hcp
     */
    public function setLastName(string $lastName): Hcp
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Hcp
     */
    public function setPhoneNumber(string $phoneNumber): Hcp
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryEmail(): string
    {
        return $this->primaryEmail;
    }

    /**
     * @param string $primaryEmail
     * @return Hcp
     */
    public function setPrimaryEmail(string $primaryEmail): Hcp
    {
        $this->primaryEmail = $primaryEmail;
        return $this;
    }

    /**
     * @return \App\Modules\Hcp\Entity\Address
     */
    public function getAddress(): \App\Modules\Hcp\Entity\Address
    {
        return $this->address;
    }

    /**
     * @param \App\Modules\Hcp\Entity\Address $address
     * @return Hcp
     */
    public function setAddress(\App\Modules\Hcp\Entity\Address $address): Hcp
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getAgencies(): Collection
    {
        return $this->agencies;
    }

    /**
     * @param Agency $agency
     * @return $this
     */
    public function addAgency(Agency $agency): self
    {
        if (!$this->agencies->contains($agency)) {
            $this->agencies[] = $agency;
        }

        return $this;
    }

    /**
     * @param Agency $agency
     * @return $this
     */
    public function removeAgency(Agency $agency): self
    {
        $this->agencies->removeElement($agency);

        return $this;
    }
}
