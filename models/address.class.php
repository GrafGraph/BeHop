<?php
namespace beHop;
class Address extends BaseModel
{
    const TABLENAME ='`address`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'city' => ['type' => BaseModel::TYPE_STRING, 'max' => 50], 
        'street' => ['type' => BaseModel::TYPE_STRING, 'max' => 100],
        'number' => ['type' => BaseModel::TYPE_STRING, 'min' => 1, , 'max' => 10],
        'zip' => ['type' => BaseModel::TYPE_STRING, 'min' => 5, 'max' => 5], 
        'country' => ['type' => BaseModel::TYPE_STRING, , 'max' => 50]
    ];
}