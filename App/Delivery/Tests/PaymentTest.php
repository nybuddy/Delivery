<?php
/**
 * Created by PhpStorm.
 * User: romanf
 * Date: 4/12/15
 * Time: 12:38 AM
 */

namespace App\Delivery\Tests;
use App\Delivery\Payment;


class PaymentTest extends \PHPUnit_Framework_TestCase{



    /**

     * @expectedException  InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidConstructorArgumentsItems()
    {
        new Payment([]);
    }

    /**

     * @expectedException  InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidConstructorArgumentsItemsNegative()
    {
        new Payment([payment=>-20]);
    }

    public function testObjectCanBeConstructedForValidConstructorArguments()
    {
        $P = new Payment([payment=>20,'date'=>'04052015']);
        $this->assertInstanceOf(Payment::class, $P);
        return $P;
    }

    /**
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     * @param Payment $P
     */

    public function testPriceCanBeRetrieved(Payment $P)
    {
        $this->assertEquals(20, $P->getAmount());
    }

} 