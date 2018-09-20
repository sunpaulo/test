<?php

namespace App\Models\Physical;

trait Offer
{
    /**
     * @return
     */
    public function getProductId()
    {
        return $this->product_id;
    }
    
    /**
     * @return $this
     */
    public function setProductId($value)
    {
        $this->product_id = $value;
        
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
     * @return $this
     */
    public function setSellerId($value)
    {
        $this->seller_id = $value;
        
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
        $this->price = $value;
        
        return $this;
    }
}