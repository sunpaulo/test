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
        $this->name = trim($value);

        return $this;
    }

    /**
     * @return
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return $this
     */
    public function setPrice($value)
    {
        $this->price = is_int($value) ? $value : (float) $value;

        return $this;
    }

    /**
     * @return
     */
    public function getManagerId()
    {
        return $this->manager_id;
    }

    /**
     * @return $this
     */
    public function setManagerId(int $value)
    {
        $this->manager_id = $value;

        return $this;
    }
}