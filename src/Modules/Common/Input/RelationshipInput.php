<?php

namespace App\Modules\Common\Input;

class RelationshipInput
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var string
     */
    private string $type;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return RelationshipInput
     */
    public function setId(string $id): RelationshipInput
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return RelationshipInput
     */
    public function setType(string $type): RelationshipInput
    {
        $this->type = $type;

        return $this;
    }
}
