<?php

namespace App\Traits;

/**
 * Trait ModelTrait
 * @package App\Traits
 * @property $id int
 * @property $deleted_at string
 */
trait ModelTrait
{
    protected function getId()
    {
        return $this->id;
    }

    public static function getTableName()
    {
        return with(new static())->getTable();
    }
}