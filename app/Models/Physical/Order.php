<?php

namespace App\Models\Physical;

trait Order
{
    /**
     * @return
     */
    public function getOfferId()
    {
        return $this->offer_id;
    }
    
    /**
     * @param $value int
     * @return $this
     */
    public function setOfferId(int $value)
    {
        $this->offer_id = $value;
        
        return $this;
    }
    
    /**
     * @return
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }
    
    /**
     * @return $this
     */
    public function setCustomerId($value)
    {
        $this->customer_id = $value;
        
        return $this;
    }
}