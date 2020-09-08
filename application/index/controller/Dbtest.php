<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

use app\index\model\Dbconllection;

class Dbtest extends Controller
{
     

    public function index()
    {
        //添加数据
        $data = ['username'=>'happy','sex'=>'1','phone'=>'15012345678','uid'=>'1'];
        $res = Db::table('demodb')->insert($data);
        
        //查询数据
        $arr = Db::table('demodb')->select();
 
        //修改数据
       // $data = ['username'=>'黄小小涛'];
       // $res = Db::connect($mongodb)->table('demodb')->where('uid','1')->update($data);



        echo "ok";
    }

    public function mongoInsert()
    {
        $mongodb = config('mongodb');
        //添加数据
         $data = ['username'=>'happy','sex'=>'1','phone'=>'15012345678','uid'=>'1'];
          $res = Db::connect($mongodb)->table('userdemo')->insert($data);

        //查询数据
         $arr = Db::connect($mongodb)->table('userdemo')->select();
         $arr = Db::connect($mongodb)->table('userdemo')->where('uid','1')->select();

        //修改数据
        // $data = ['username'=>'黄小小涛'];
        // $res = Db::connect($mongodb)->table('demodb')->where('uid','1')->update($data);



        echo "ok";
    }

    public function test(){
        $dbadd = new Dbconllection;
        $data= array("username" =>"zhangsan","password"=>123456);
        $res = $dbadd->add("demodb",$data);
        var_dump($res);
    }
   
}