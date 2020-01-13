<?php
namespace beHop;
class ShoppingCart_has_product extends BaseModel
{
    const TABLENAME ='`shoppingCart_has_product`';

    protected $schema= [
        'id' => ['type' => BaseModel::TYPE_INT],
        'shoppingCart_id' => ['type' => BaseModel::TYPE_INT],
        'product_id' => ['type' => BaseModel::TYPE_INT],
        'quantity' => ['type' => BaseModel::TYPE_INT]
    ];
}