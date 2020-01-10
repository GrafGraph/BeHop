<?php

class User extends BaseModel
{
    const TABLENAME ='`user`';

    protected $schema =[
        // 'id' => ['type' => BaseModel::TYPE_INT],
        // 'createdAt' => ['type' => BaseModel::TYPE_STRING],
        // 'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'email' => ['type' => BaseModel::TYPE_STRING],
        'password' => ['type' => BaseModel::TYPE_STRING],
        'firstName' => ['type' => BaseModel::TYPE_STRING],
        'lastName' => ['type' => BaseModel::TYPE_STRING],
        // 'address_id' => ['type' => BaseModel::TYPE_INT],
        // 'shoppingCart_id' => ['type' => BaseModel::TYPE_INT]
    ];
}





