<?php
/**
 * Created by PhpStorm.
 * User: xuanhung
 * Date: 7/17/18
 * Time: 8:43 PM
 */

namespace App;


class Bakery
{
    function __construct(){
        $this -> id = 0;
        $this -> name = '';
        $this -> categoryId = 1;
        $this -> price = 0;
        $this -> description = '';
        $this -> image = '';
        $this -> detail = '';
        $this -> note = '';
    }
}