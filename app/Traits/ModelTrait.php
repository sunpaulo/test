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
    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->{$this->getCreatedAtColumn()};
    }

    public function getUpdatedAt()
    {
        return $this->{$this->getUpdatedAtColumn()};
    }

    public static function getTableName()
    {
        return with(new static())->getTable();
    }
}