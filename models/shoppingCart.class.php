<?php

class ShoppingCart
{
    const TBALENAME ='`shoppingCart`';
    private $data;

    public function __construct($id, $createdAt, $updatedAt, $totalAmount, $user_id)
    {
        $this->data[`id`] = $id;
        $this->data[`createdAt`] = $createdAt;
        $this->data[`updatedAt`] = $updatedAt;
        $this->data[`totalAmount`] = $totalAmount;
        $this->data[`user_id`] = $user_id;
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
            $sql = 'INSERT INTO ' . self::TBALENAME . '(totalAmount, user_id) VALUES(:totalAmount, :user_id)';
            $statement = $database->prepare($sql);
            $statement->bindParam(':totalAmount', $this->totalAmount);
            $statement->bindParam(':user_id', $this->user_id);

            $statement->execute();
            return true;
        }
        catch(\PDOException $e)
        {
            die(('Error inserting shoppingCart: ' . $e->getMessage()));
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
            die('Error deleting shoppingCart '.$e->getMessage());
        }
        return false;
    }
}