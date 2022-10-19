<?php

namespace App\Modules\Agency\Input;

use App\Modules\Common\Input\JsonSerializableInputInterface;
use Symfony\Component\Validator\Constraints as Assert;

class AgencyCreateInput implements JsonSerializableInputInterface
{
    #[Assert\NotBlank]
    #[Assert\Type('string')]
    private string $name;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    private string $status;

    private ?string $notes;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AgencyCreateInput
     */
    public function setName(string $name): AgencyCreateInput
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
     * @return AgencyCreateInput
     */
    public function setStatus(string $status): AgencyCreateInput
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
     * @return AgencyCreateInput
     */
    public function setNotes(?string $notes): AgencyCreateInput
    {
        $this->notes = $notes;

        return $this;
    }
}
