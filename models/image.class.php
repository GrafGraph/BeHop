<?php
// @author Anton Bespalov
namespace beHop;
class Image extends BaseModel
{
    const TABLENAME ='`image`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'imageUrl' => ['type'=> BaseModel::TYPE_STRING, 'max' => 255],
        'altText' => ['type'=> BaseModel::TYPE_STRING, 'max' => 255],
        'product_id' => ['type' => BaseModel::TYPE_INT],
        'sales_id' => ['type' => BaseModel::TYPE_INT]
    ];
}