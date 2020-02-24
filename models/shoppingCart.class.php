<?php
namespace beHop;
class ShoppingCart extends BaseModel
{
    const TABLENAME ='`shoppingCart`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'user_id' => ['type' => BaseModel::TYPE_INT]
    ];

    // Sets user_id in Shoppingcart null upon Order so that the user can get 
    // a new and unique shoppingcart while this one is saved in the new Order.
    // @author: Michael Hopp
    public function setUserIDNull(&$errors = null)
    {
        $database = $GLOBALS['database'];

        try
        {
            $sql = 'UPDATE ' . self::tablename() . ' SET user_id = null' ;
            $sql .= ' WHERE id = ' . $this->data['id'];

            $statement = $database->prepare($sql);
            $statement->execute();
             
            return true;
        }
        catch(\PDOException $e)
        {
            $errors[] = 'Error updating '.get_called_class();
        }
        return false;
    }
}