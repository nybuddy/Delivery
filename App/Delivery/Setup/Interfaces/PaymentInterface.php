<?php
/**
 * Created by PhpStorm.
 * User: romanf
 * Date: 4/8/15
 * Time: 3:50 PM
 */



namespace App\Delivery\Setup\Interfaces;

interface PaymentInterface

{

    /**

     * @return int The amount of the individual payment

     */

    public function getAmount();

}