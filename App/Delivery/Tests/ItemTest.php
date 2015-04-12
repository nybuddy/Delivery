<?php
/**
 * Created by PhpStorm.
 * User: romanf
 * Date: 4/9/15
 * Time: 6:32 PM
 */

namespace App\Delivery\Tests;
use App\Delivery\Item;

class ItemTest extends \PHPUnit_Framework_TestCase{



    /**

     * @expectedException  InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidConstructorArgumentsItems()
    {
        new Item([]);
    }

    /**

     * @expectedException  InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidConstructorArgumentsItemsNegative()
    {
        new Item([price=>-20]);
    }

    public function testObjectCanBeConstructedForValidConstructorArguments()
    {
        $I = new Item([price=>20,'date'=>'04052015']);
        $this->assertInstanceOf(Item::class, $I);
        return $I;
    }

    /**
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     * @param Item $I
     */

    public function testPriceCanBeRetrieved(Item $I)
    {
        $this->assertEquals(20, $I->getAmount());
    }



} 