<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;


class Index extends Controller
{
    public function index($name='new index')
    {
        $this->assign('name',$name);
        return $this->fetch();
    }
    public function show($name='new index')
    {
        $this->assign('name',$name);
        return $this->fetch();
    }
    public function login($name='new index')
    {
       // $this->assign('name',$name);
        return $this->fetch();
    }
    public function dbtest(Request $request )
    {   header('Content-Type:text/html; charset=utf-8');
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST");

        dump(json_encode($request->param()));

        $data=Db::table('demodb')->select();

       // var_dump(json_encode($data));
        return  json(['status'=>200, 'msg'=>'成功','data'=>$data,'require'=>$request->param()]);

        //$this->assign('name',$data);
        //return $this->fetch();
    }

    public function mogodbtest()
    {
    	$mongodb = config('mongodb');
    	$data = Db::connect($mongodb)->table('userdemo')->field('id,username')
	    ->limit(10)
	    ->order('id','desc')
	    ->select();
        var_dump($data);
        $this->assign('data',$data);
    	return $this->fetch();
    }

    //测试 请求接口
    public function  testapi(){
        $item = array('attrCategory'=>'乳胶漆','attrName'=>'乳胶漆','barCode'=>'600038035','price'=>'6.000');
        $itemlist =array($item);
        $arr = array('storeId'=>'1562640961084','merchantId'=>'1562640847275','agencyId'=>'1559204995650','itemList'=>$itemlist);
        dump($arr);
        $data=$this->post_json_data('http://47.52.135.163:9999/item/batchImportItem',json_encode($arr));
        dump($data);
    }

    //测试 接口
    public function postTest(){
        //显示获得的数据
        if($this->request->isPost()){
            $arr = array('a'=>'666666','b'=>999999);
            return json_encode($arr);
        }

    }
    function post_json_data($url, $data_string) {
        //初始化
        $ch = curl_init();
        //设置post方式提交
        curl_setopt($ch, CURLOPT_POST, 1);
        //设置抓取的url
        curl_setopt($ch, CURLOPT_URL, $url);
        //设置post数据
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        //设置头文件的信息作为数据流输出
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($data_string),
                'Authorization:eyJhbGciOiJIUzI1NiJ9.eyJhcGlzIjoiIiwiZXhwIjoxNTYyNjU0ODIyfQ.EwTWDNFF2g_h06EHDKwCQhVdcDf7h1wUTnJCj3zAz88'
            )
        );
        ob_start();
        //执行命令
        curl_exec($ch);
        $return_content = ob_get_contents();
        ob_end_clean();
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return array('code'=>$return_code, 'result'=>$return_content);
    }


   
}