<?php
namespace beHop;
class Address extends BaseModel
{
    const TABLENAME ='`address`';

    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING], 
        'city' => ['type' => BaseModel::TYPE_STRING, 'max' => 50], 
        'street' => ['type' => BaseModel::TYPE_STRING, 'max' => 100],
        'number' => ['type' => BaseModel::TYPE_STRING, 'min' => 1, 'max' => 10],
        'zip' => ['type' => BaseModel::TYPE_STRING, 'min' => 5, 'max' => 5],
        'country' => ['type' => BaseModel::TYPE_STRING, 'max' => 50]
    ];

    public static function findAddress($addressData)
    {
        $where = 'city ="'.$addressData['city'].'" and street ="'
        .$addressData['street'].'" and number ="'.$addressData['number']
        .'" and zip ="'.$addressData['zip'].'" and country ="'
        .$addressData['country'].'"';
        // foreach($addressData as $key => $attribute)
        // {
        // }
        return self::findOne($where);
    }
    public static function validateAddress($newAddress, &$insertError){
        $newAddress->validate($insertError);

        if (!preg_match('/^[A-Za-z -]*$/', $newAddress->__get('street'))) {
            array_push($insertError, 'Street may only consist of Letters, Spaces and Hyphen!');
        }

        if (!preg_match('/^[0-9]+[ ]?[a-z]?$/', $newAddress->__get('number'))) {
            array_push($insertError, 'House Number may only consist  of Numbers and Letters (A Number must be first)!');
        }

        if (!preg_match('/^[0-9]*$/', $newAddress->__get('zip'))) {
            array_push($insertError, 'ZIP may only consist of Numbers!');
        }

        if (!preg_match('/^[A-Za-z -]*$/', $newAddress->__get('city'))) {
            array_push($insertError, 'City may only consist of Letters, Spaces and Hypehen!');
        }

        if(count($insertError) == 0){
            return true;
        }else{
            return false;
        }
    }
}