<?php
namespace beHop;
class Product extends BaseModel
{
    const TABLENAME ='`product`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseMOdel::TYPE_STRING],
        'name' => ['type' => BaseModel::TYPE_STRING],
        'price' => ['type' => BaseModel::TYPE_FLOAT],
        'description' => ['type' => BaseModel::TYPE_STRING]
    ];
   
}