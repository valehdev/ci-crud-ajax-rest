<?php
/**
 * Created by PhpStorm.
 * User: ValehA
 * Date: 9/11/2017
 * Time: 11:23 AM
 */

if (!function_exists('dd')) {
    function dd($str = '')
    {
        echo '<pre>';
        echo var_dump($str);
        echo '</pre>';

        die();
    }
}