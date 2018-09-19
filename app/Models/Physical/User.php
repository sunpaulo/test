<?php

namespace App\Models\Physical;

trait User
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return $this
     */
    public function setEmail($value)
    {
        $this->email = $value;

        return $this;
    }

    /**
     * @return
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return $this
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);

        return $this;
    }
    
    /**
     * @return
     */
    public function getRole()
    {
        return $this->role;
    }
    
    /**
     * @return $this
     */
    public function setRole($value)
    {
        $this->role = $value;
        
        return $this;
    }
}