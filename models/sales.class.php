<?php
// @author Anton Bespalov
namespace beHop;
class Sales extends BaseModel
{
    const TABLENAME ='`sales`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'name' => ['type'=> BaseModel::TYPE_STRING, 'max' => 50],
        'discountPercent' => ['type' => BaseModel::TYPE_INT, 'max' => 3]
    ];
}