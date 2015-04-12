<?php
/**
 * Created by PhpStorm.
 * User: romanf
 * Date: 4/8/15
 * Time: 3:57 PM
 */

namespace App\Delivery\Setup\bClasses;



class Basic{

    protected $info;


    /**
     * @param mixed $name
     * @param mixed $value
     */

    function __set($name,$value)
    {



        $this->info["$name"]=$value;

    }

    /**
     * @param mixed $name
     * @return mixed
     */

    function __get($name){
        if (array_key_exists($name, $this->info)) {
            return $this->info[$name];
        }
        return null;

    }


}