<?php

namespace App\Modules\Agency\Input;

use App\Modules\Agency\Entity\Agency;
use App\Modules\Common\Input\JsonSerializableInputInterface;
use App\Modules\Common\Validator as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;

#[AppAssert\UniqueValueInEntity([
    'entityClass' => Agency::class,
    'field' => 'name',
    'entityId' => 'agencyUuid',
])]
class AgencyUpdateInput implements JsonSerializableInputInterface
{
    private string $agencyUuid;

    #[Assert\NotBlank]
    #[Assert\Type('string')]

    private string $name;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    private string $status;

    private ?string $notes;

    private ?string $deactivationReason;

    /**
     * @return string
     */
    public function getAgencyUuid(): string
    {
        return $this->agencyUuid;
    }

    /**
     * @param string $agencyUuid
     * @return AgencyUpdateInput
     */
    public function setAgencyUuid(string $agencyUuid): AgencyUpdateInput
    {
        $this->agencyUuid = $agencyUuid;

        return $this;
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
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

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
     * @return self
     */
    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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
     * @return AgencyUpdateInput
     */
    public function setDeactivationReason(?string $deactivationReason): AgencyUpdateInput
    {
        $this->deactivationReason = $deactivationReason;

        return $this;
    }


}
