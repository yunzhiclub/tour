<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
/**
* 图片管理
*/
class UploadController extends IndexController
{
    public function index()
    {
        $data = Request::instance()->param();
        var_dump($data);
        var_dump(1);
    }
}