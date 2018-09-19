<?php

namespace App\Models\Physical;

trait Category
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
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setParentId(int $value)
    {
        $this->parent_id = $value;

        return $this;
    }
}