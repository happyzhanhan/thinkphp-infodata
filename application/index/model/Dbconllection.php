<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Dbconllection extends Model{

    public function add($database,$data){

        Db::startTrans();
        try{
            Db::table($database)->insert($data);
            // 提交事务
            Db::commit();    
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }

    }
}