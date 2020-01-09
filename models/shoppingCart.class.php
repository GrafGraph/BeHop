<?php

class ShoppingCart extends BaseModel
{
    const TABLENAME ='`shoppingCart`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'totalAmount' => ['tyoe' => BaseModel::TYPE_INT],
        'user_id' => ['tyoe' => BaseModel::TYPE_INT]
    ];
}