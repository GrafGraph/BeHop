<?php
namespace beHop;
class Product_has_category extends BaseModel
{
    const TABLENAME ='`product_has_category`';

    protected $schema =[
        'product_id' => ['type' => BaseModel::TYPE_INT],
        'category_id' => ['type' => BaseModel::TYPE_INT]
    ];
}