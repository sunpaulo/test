<?php

namespace App\Models\Physical;

trait Rate
{
    /**
     * @return
     */
    public function getAuctionId()
    {
        return $this->auction_id;
    }

    /**
     * @param $value int
     * @return $this
     */
    public function setAuctionId(int $value)
    {
        $this->auction_id = $value;

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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value float
     * @return $this
     */
    public function setValue(float $value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return
     */
    public function getHiddenAuction()
    {
        return $this->hidden_auction;
    }

    /**
     * @param $value bool
     * @return $this
     */
    public function setHiddenAuction(bool $value)
    {
        $this->hidden_auction = $value;

        return $this;
    }
}