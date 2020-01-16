<?php
namespace beHop;
class Product extends BaseModel
{
    const TABLENAME ='`product`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseMOdel::TYPE_STRING],
        'name' => ['type' => BaseModel::TYPE_STRING, 'max' => 45],
        'price' => ['type' => BaseModel::TYPE_FLOAT],
        'color' => ['type' => BaseModel::TYPE_STRING, 'max' => 50],
        'brand' => ['type' => BaseModel::TYPE_STRING, 'max' => 50],
        'numberInStock' => ['type' => BaseModel::TYPE_INT],
        'description' => ['type' => BaseModel::TYPE_STRING, 'max' => 255],
        'category_id' => ['type' => BaseModel::TYPE_INT],
        'sales_id' => ['type' => BaseModel::TYPE_INT]
    ];
   
}