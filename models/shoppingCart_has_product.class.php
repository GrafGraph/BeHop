<?php

class ShoppingCart_has_product
{
    const TBALENAME ='`shoppingCart_has_product`';
    private $data;

    public function __construct($shoppingCart_id, $product_id, $quantity, $name, $price, 
                                $description)
    {
        $this->data[`shoppingCart_id`] = $shoppingCart_id;
        $this->data[`product_id`] = $product_id;
        $this->data[`quantity`] = $quantity;
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
            die('Select statement failed: ' . $e->getMessage());
        }
        return $result;
    }
    public function insert()
    {
        $database = $GLOBALS['database'];
        try 
        {
            $sql = 'INSERT INTO ' . self::TBALENAME . '(shoppingCart_id, product_id, quantity) VALUES(:shoppingCart_id, :product_id, :quantity)';
            $statement = $database->prepare($sql);
            $statement->bindParam(':shoppingCart_id', $this->shoppingCart_id);
            $statement->bindParam(':product_id', $this->product_id);
            $statement->bindParam(':quantity', $this->quantity);


            $statement->execute();
            return true;
        }
        catch(\PDOException $e)
        {
            die(('Error inserting shoppingCart_has_product: ' . $e->getMessage()));
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
            die('Error deleting shoppingCart_has_product '.$e->getMessage());
        }
        return false;
    }
}