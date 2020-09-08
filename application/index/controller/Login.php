<?php
/**
 * Created by PhpStorm.
 * User: 16597
 * Date: 2019/8/19
 * Time: 11:44
 */
namespace app\index\controller;

use think\Controller;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }
}