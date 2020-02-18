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
        'address_id' => ['type' => BaseModel::TYPE_INT]
    ];

    public static function checkPassword($password, &$error){

        if(!preg_match('/[!@#$%&?.]/',$password)) {
            $error =  "Password must contain at least one of these symbols: ! @ # . $ % & ? ";
            return false;
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $error =  "Password must contain at least one Upper-Case Letter";
            return false;
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $error =  "Password must contain at least one Lower-Case Letter";
            return false;
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $error =  "Password must contain at least one Number";
            return false;
        }
        return true;
    }

    public static function validateUser($newUser, &$insertError){
        $newUser->validate($insertError);

        if (!preg_match('/^[A-Za-zßäöü]*$/', $newUser->__get('firstName'))) {
            array_push($insertError, 'First Name may only consist of Letters');
        }

        if (!preg_match('/^[A-Za-zßäöü]*$/', $newUser->__get('lastName'))) {
            array_push($insertError, 'Last Name may only consist of Letters');
        }

        if (!preg_match('/[0-9A-Za-z_.]*[@][0-9A-Za-z-.]+[.][a-z]*/', $newUser->__get('email'))) {
            array_push($insertError, 'Email must contain a Domain!');
        }

        if(count($insertError) == 0){
            return true;
        }else{
            return false;
        }
    }
}





