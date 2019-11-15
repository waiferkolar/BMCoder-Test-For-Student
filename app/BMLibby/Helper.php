<?php
/**
 * Created by PhpStorm.
 * User: waiferkolar
 * Date: 2019-11-14
 * Time: 15:34
 */

namespace App\BMLibby;


class Helper
{
    public static function beautify($msg)
    {
        echo "<pre>" . print_r($msg, true) . "</pre>";
    }
}