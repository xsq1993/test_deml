<?php
namespace app\controller;

use app\BaseController;
use app\model\Org;

class News extends BaseController
{
    public function test_array_walk(){
        $arr1 = ["a"=>"a1","b"=>"b1","c"=>"c1","d"=>"d1","e"=>"e1"];


    }


    /**
     * @param  string $name 数据名称
     * @return mixed
     * @Route("hello/:name")
     */
    public function read()
    {
        $data = Org::select()->toArray();

        $pid = 5;
        $f_data = [$pid];
        $r_data = [$pid];
        do{
            $status = false;
            $o_data = [];
            foreach ($f_data as $k=>$v){
                foreach ($data as $k1=>$v1){
                    if($v1['parent_id'] == $v){
                        $o_data[] = $v1['id'];
                        $r_data[] = $v1['id'];
                        unset($f_data[$k]);
                        $status = true;
                    }
                }
            }
            $f_data = $o_data;
        }while($status == true);

        print_r($r_data);
    }
}