<?php
// @author Anton Bespalov
namespace beHop;
class Category extends BaseModel
{
    const TABLENAME ='`category`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'name' => ['type'=> BaseModel::TYPE_STRING, 'max' => 50]
    ];
}