<?php

namespace Core\ORM;

use QueryBuilder;

require_once 'QueryBuilder.php';

abstract class BaseModel extends QueryBuilder
{
    private ?int $id = null;

    public static function find(int $id) : object
    {
        $obModel = new static();
        $arSelected = self::select(get_class($obModel), $id);

        foreach ($arSelected as $field => $value) {
            $obModel->$field = $value;
        }
        return $obModel;
    }

    public static function findAll(int $offset, int $limit = 10) : array
    {
        $arResult = [];
        return $arResult;
    }

    public function save() : bool
    {
        if ($this->id) {
            if (!self::update(static::class, $this->id, ['name' => 'test'])) {
                return false;
            }
        } else {
            if (self::insert(static::class, ['name' => 'dizel'], $id)) {
                $this->id = $id;
            } else {
                return false;
            }
        }
        return true;
    }
}