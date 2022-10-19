<?php

namespace App\Modules\Agency\Input;

use App\Modules\Common\Input\JsonSerializableInputInterface;
use Symfony\Component\Validator\Constraints as Assert;

class AgencyUpdateInput implements JsonSerializableInputInterface
{
    #[Assert\NotBlank]
    #[Assert\Type('string')]
    private string $name;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    private string $status;

    private ?string $notes;

    public ?string $deactivationReason;

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
