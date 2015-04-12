<?php
/**
 * Created by PhpStorm.
 * User: romanf
 * Date: 4/8/15
 * Time: 5:10 PM
 */

namespace App\Delivery;
use App\Delivery\Setup\Interfaces as I;


class Order extends Setup\bClasses\Basic implements I\OrderInterface{


  /*
   *
   * we can do what ever we want in this function
   */
   protected  function overPayment(){
       if($this->balance<0)
       {
           throw new \UnexpectedValueException('overpayment');
       }


   }


    /**
     * @param Array $A
     *
     */
    function __construct(Array $A){

       if(array_key_exists('payments',$A)){

           $this->payments=$A['payments'];
       }

        if(array_key_exists('items',$A)){

            $this->items=$A['items'];
        }

        #precalculate balance
        foreach($this->payments as $payment)
        {
            $this->balance-=$payment->getAmount();
        }
        foreach($this->items as $item)
        {
            $this->balance+=$item->getAmount();
        }


        $this->overPayment();

    }


    /**

     * @param ItemInterface $item An item that is part of the order

     */



    function addItem(I\ItemInterface $item){

      $this->info['items'][]=$item;
      $this->balance+=$item->getAmount();


    }

    /**
     *
     * return boolean
     */

    function balanceIsValid(){

       $balance=0;

       foreach($this->info['payments'] as $payment)
       {
           $balance-=$payment->getAmount();
       }
        foreach($this->info['items'] as $item)
        {
            $balance+=$item->getAmount();
        }
        return $this->balance==$balance;

    }


    /**

     * @param PaymentInterface $payment A payment that has been applied to the order

     */

     function addPayment(I\PaymentInterface $payment){
        $this->info['payments'][]=$payment;
        $this->balance-=$payment->getAmount();
        $this->overPayment();


    }

    /**

     * @return bool true if the order has been paid in full, false if not.

     */

    public function isPaidInFull(){

        return $this->balance==0;
    }



}