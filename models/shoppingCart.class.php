<?php
namespace beHop;
class ShoppingCart extends BaseModel
{
    const TABLENAME ='`shoppingCart`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'user_id' => ['type' => BaseModel::TYPE_INT]
    ];
}