<?php

namespace App\Models\Physical;

trait Product
{
    /**
     * @return
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setName($value)
    {
        $this->name = $value;

        return $this;
    }

    /**
     * @return
     */
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * @param $value int
     * @return $this
     */
    public function setCreatorId(int $value)
    {
        $this->creator_id = $value;

        return $this;
    }

    /**
     * @return
     */
    public function getModeratorId()
    {
        return $this->moderator_id;
    }

    /**
     * @param $value int
     * @return $this
     */
    public function setModeratorId(int $value)
    {
        $this->moderator_id = $value;

        return $this;
    }
}