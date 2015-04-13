<?php
/**
 * Created by PhpStorm.
 * User: romanf
 * Date: 4/12/15
 * Time: 12:38 AM
 */

namespace App\Delivery\Tests;


use App\Delivery\Item;
use App\Delivery\Order;
use App\Delivery\Payment;

class OrderTest extends \PHPUnit_Framework_TestCase{


    /**

     * @expectedException  UnexpectedValueException
     */
   function testExceptionIsRaisedForOverPaymentConstructorArgumentsItems()
    {
        new Order(['items'=>[new Item([price=>20])],'payments'=>[new Payment([payment=>40])]]);

    }









    /**
     * @dataProvider ValidConstructorArguments
     */

     function testObjectCanBeConstructedForValidConstructorArguments(ARRAY $A)
    {
        $O = new Order($A);
        $this->assertInstanceOf(Order::class, $O);

    }




    /**
     * @dataProvider ValidConstructorArguments
     * @expectedException  UnexpectedValueException
     */

    function testPaymentCanBeAddedToDoOverpayment(ARRAY $A)
    {
        $O = new Order($A);
        $O->addPayment(new Payment([payment=>500]));

    }


    /**
     * @dataProvider ValidConstructorArguments
     *
     */

    function testBalanceIsValid(ARRAY $A)
    {
        $O = new Order($A);
        $O->addPayment(new Payment([payment=>1]));
        $O->addPayment(new Payment([payment=>1]));
        $O->addPayment(new Payment([payment=>1]));
        $O->addItem(new Item([price=>10]));
        $this->assertTrue($O->balanceIsValid());
    }






    /**
     * @dataProvider ValidConstructorArguments
     *
     */

    function testPaymentCanBeAdded(ARRAY $A)
    {
        $O = new Order($A);
        $O->addPayment(new Payment([payment=>1]));

    }


    /**
     * @dataProvider ValidConstructorArguments
     *
     */

    function testItemCanBeAdded(ARRAY $A)
    {
        $O = new Order($A);
        $O->addItem(new Item([price=>10]));

    }




    function ValidConstructorArguments(){
        return [
            [
                ['items'=>[new Item([price=>20]),new Item([price=>60]),new Item([price=>25])],
                    'payments'=>[new Payment([payment=>40]),new Payment([payment=>15])]
                ]
            ],



            [
                ['items'=>[new Item([price=>10]),new Item([price=>10]),new Item([price=>7]), new Item([price=>34])],
                    'payments'=>[new Payment([payment=>4]),new Payment([payment=>5]),new Payment([payment=>2])]]
            ],

        ];
    }

    /**
     * @dataProvider ValidConstructorArguments
     *
     */
    function testisPaidInFull(ARRAY $A){
        $O = new Order($A);
        $O->addPayment(new Payment([payment=>50]));
        $this->assertTrue($O->isPaidInFull());


    }





}