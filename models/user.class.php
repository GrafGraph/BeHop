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
        $result = null;
        try 
        {
            $sql = 'SELECT * FROM' . self::TBALENAME;
            if(!empty($where))
            {
                $sql .= 'WHERE' .$where . ';';
            }
            $result =$database->query($sql)->fetchAll();
        }
        catch(\PDOException $e)
        {
            die('Select statement failed: ' , $e->getMessage());
        }
        return $result;
    }
    public function insert()
    {
        $database = $GLOBALS['database'];
        try 
        {
            $sql = 'INSERT INTO ' . self::TBALENAME . '(username, email, password, firstName, lastName) VALUES(:username, :email, :password, :firstName, :lastName)';
            $statement = $database->prepare($sql);
            $statement->bindParam(':username', $this->username);
            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':password', $this->password);
            $statement->bindParam(':firstname', $this->firstname);
            $statement->bindParam(':lastname', $this->lastname);

            $statement->execute();
            return true;
        }
        catch(\PDOException $e)
        {
            die(('Error inserting user: ' . $e->getMessage()));
        }
        return false;
    }
    public function delete()
    {
        $database = $GLOBALS['database'];

        try
        {
            $sql = 'DELETE FROM ' .self::TBALENAME . ' WHERE id = ' .$this->id;
            $database->exec($sql);
            return true;
        }
        catch(\PDOException $e)
        {
            die('Error deleting user '.$e->getMessage());
        }
        return false;
    }
}





