<?php

class User
{
    const TBALENAME ='`user`';
    private $data;

    public function __construct($id, $createdAt, $updatedAt, $username, $email, $password, 
                                $firstName, $lastName, $adress_id, $shoppingCart_id)
    {
        $this->data[`id`] = $id;
        $this->data[`createdAt`] = $createdAt;
        $this->data[`updatedAt`] = $updatedAt;
        $this->data[`username`] = $username;
        $this->data[`email`] = $email;
        $this->data[`password`] = $password;
        $this->data[`firstName`] =  $firstName;
        $this->data[`lastName`] = $lastName;
        $this->data[`address_id`] = $adress_id;
        $this->data[`shoppingCart_id`] = $shoppingCart_id;
    }
    public function __get($key)
    {
        if(isset($this->data[$key]))
        {
            return $this->data[$key];
        }
    }
    public static function find($where = '')
    {
        $database = $GLOBALS['database'];
    }
}




