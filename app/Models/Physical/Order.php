<?php

namespace App\Models\Physical;

trait Order
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
    public function getSellerId()
    {
        return $this->seller_id;
    }

    /**
     * @param $value int
     * @return $this
     */
    public function setSellerId(int $value)
    {
        $this->seller_id = $value;

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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $value float
     * @return $this
     */
    public function setPrice(float $value)
    {
        $this->price = $value;

        return $this;
    }
}