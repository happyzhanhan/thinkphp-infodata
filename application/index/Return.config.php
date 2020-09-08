<?php
/**
 * Created by PhpStorm.
 * User: 16597
 * Date: 2019/1/15
 * Time: 11:07
 */
define("return_val", "return array('code' => 0, 'msg' => '', 'data' => '');");
define("RETURN_SUCCESS",        0);
define("RETURN_RUNTIME_ERR",    1);
define("RETURN_FILE_NOT_EXIST", 2);

class ReturnConf{
    public static function CommonReturn(){
        return eval(return_val);
    }
}
