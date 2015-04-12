<?php
/**
 * Created by PhpStorm.
 * User: romanf
 * Date: 4/8/15
 * Time: 4:31 PM
 */

namespace App\Delivery;

define("price", "Itemprice");


class Item extends Setup\bClasses\Basic implements Setup\Interfaces\ItemInterface{


    /**
     * @param Array $A
     *
     */


    function __construct(Array $A){

        if(!array_key_exists(price,$A)||$A[price]<0)
        {


            throw new \InvalidArgumentException('Price  is missing or negative');


        }

        foreach($A as $key=>$item)
        {
            $this->{$key}=$item;

        }

    }
    function  getAmount(){
        return $this->{price};
    }


} 