<?php

namespace App\Models\Physical;

trait Auction
{
    /**
     * @return
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param $value int
     * @return $this
     */
    public function setCustomerId(int $value)
    {
        $this->customer_id = $value;

        return $this;
    }

    /**
     * @return
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param $value int
     * @return $this
     */
    public function setProductId(int $value)
    {
        $this->product_id = $value;

        return $this;
    }

    /**
     * @return
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setStatus(string $value)
    {
        $this->status = $value;

        return $this;
    }

    /**
     * @return
     */
    public function getIsHidden()
    {
        return $this->is_hidden;
    }

    /**
     * @param $value bool
     * @return $this
     */
    public function setIsHidden(bool $value)
    {
        $this->is_hidden = $value;

        return $this;
    }
}