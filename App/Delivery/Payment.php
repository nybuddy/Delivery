<?php
/**
 * Created by PhpStorm.
 * User: romanf
 * Date: 4/8/15
 * Time: 4:53 PM
 */

namespace App\Delivery;

define("payment", "payment_amount");


class Payment extends Setup\bClasses\Basic implements Setup\Interfaces\PaymentInterface{


    /**
     * @param Array $A
     *
     */


    function __construct(Array $A){

        if(!array_key_exists(payment,$A)||$A[payment]<0)
        {
            throw new \InvalidArgumentException('payment amount is missing or negative');


        }

        foreach($A as $key=>$item)
        {
            $this->{$key}=$item;

        }

    }
    function  getAmount(){
        return $this->{payment};
    }


}