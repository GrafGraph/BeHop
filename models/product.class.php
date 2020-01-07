<?php

class Product
{
    const TBALENAME ='`product`';
    private $data;

    public function __construct($id, $createdAt, $updatedAt, $name, $price, 
                                $description)
    {
        $this->data[`id`] = $id;
        $this->data[`createdAt`] = $createdAt;
        $this->data[`updatedAt`] = $updatedAt;
        $this->data[`name`] = $name;
        $this->data[`price`] = $price;
        $this->data[`description`] =  $description;
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
            $sql = 'INSERT INTO ' . self::TBALENAME . '(name, price, description) VALUES(:name, :price, :description)';
            $statement = $database->prepare($sql);
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':price', $this->price);
            $statement->bindParam(':description', $this->description);


            $statement->execute();
            return true;
        }
        catch(\PDOException $e)
        {
            die(('Error inserting product: ' . $e->getMessage()));
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
            die('Error deleting product '.$e->getMessage());
        }
        return false;
    }
}