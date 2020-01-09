<?php

class Address
{
    const TBALENAME ='`address`';
    private $data;

    public function __construct($id, $createdAt, $updatedAt, $city, $street, $number, 
    $zip, $country)
    {
        $this->data[`id`] = $id;
        $this->data[`createdAt`] = $createdAt;
        $this->data[`updatedAt`] = $updatedAt;
        $this->data[`city`] = $city;
        $this->data[`street`] = $street;
        $this->data[`number`] = $number;
        $this->data[`zip`] =  $zip;
        $this->data[`country`] = $country;
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
            $sql = 'INSERT INTO ' . self::TBALENAME . '(city, street, number, zip, country) VALUES(:city, :street, :number, :zip, :country)';
            $statement = $database->prepare($sql);
            $statement->bindParam(':city', $this->city);
            $statement->bindParam(':street', $this->street);
            $statement->bindParam(':number', $this->number);
            $statement->bindParam(':zip', $this->zip);
            $statement->bindParam(':country', $this->country);

            $statement->execute();
            return true;
        }
        catch(\PDOException $e)
        {
            die(('Error inserting address: ' . $e->getMessage()));
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
            die('Error deleting address '.$e->getMessage());
        }
        return false;
    }
}