<?php
namespace beHop;
class User extends BaseModel
{
    const TABLENAME = '`user`';

    protected $schema =[
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'email' => ['type' => BaseModel::TYPE_STRING, 'max' => 70],
        'password' => ['type' => BaseModel::TYPE_STRING, 'max' => 255],
        'firstName' => ['type' => BaseModel::TYPE_STRING, 'max' => 50],
        'lastName' => ['type' => BaseModel::TYPE_STRING, 'max' => 70],
        'address_id' => ['type' => BaseModel::TYPE_INT],
        'shoppingCart_id' => ['type' => BaseModel::TYPE_INT]
    ];
}





