<?php
/**
 * Created by PhpStorm.
 * User: romanf
 * Date: 4/8/15
 * Time: 3:47 PM
 */




namespace App\Delivery\Setup\Interfaces;

interface ItemInterface

{

    /**

     * @return int The price of the individual item

     */

    public function getAmount();

}