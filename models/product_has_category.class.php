<?php

class Product_has_category
{
    const TBALENAME ='`product_has_category`';
    private $data;

    public function __construct($product_id, $category_id)
    {
        $this->data[`product_id`] = $product_id;
        $this->data[`category_id`] = $category_id;
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
            $sql = 'INSERT INTO ' . self::TBALENAME . '(product_id ,category_id) VALUES(:product_id, :category_id)';
            $statement = $database->prepare($sql);
            $statement->bindParam(':product_id', $this->product_id);
            $statement->bindParam(':category_id', $this->category_id);


            $statement->execute();
            return true;
        }
        catch(\PDOException $e)
        {
            die(('Error inserting product_has_category: ' . $e->getMessage()));
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
            die('Error deleting product_has_category '.$e->getMessage());
        }
        return false;
    }
}