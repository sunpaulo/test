<?php

namespace App\Models\Physical;

trait Role
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
        $this->name = trim($value);

        return $this;
    }

    /**
     * @return
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * @return $this
     */
    public function setDisplayName($value)
    {
        $this->display_name = trim($value);

        return $this;
    }

    /**
     * @return
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = trim($value);

        return $this;
    }
}