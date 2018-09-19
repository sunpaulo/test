<?php

namespace App\Models\Physical;

trait Permission
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
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * @return $this
     */
    public function setDisplayName($value)
    {
        $this->display_name = $value;

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
        $this->description = $value;

        return $this;
    }
}