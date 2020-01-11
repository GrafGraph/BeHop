<?php
namespace beHop;
class Order extends BaseModel
{
    const TABLENAME ='`order`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'user_id' => ['type' => BaseModel::TYPE_INT]
    ];
}