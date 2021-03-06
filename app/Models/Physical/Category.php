<?php

namespace App\Models\Physical;

trait Category
{
    /**
     * @return
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @return $this
     */
    public function setTitle($value)
    {
        $this->title = $value;
        
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