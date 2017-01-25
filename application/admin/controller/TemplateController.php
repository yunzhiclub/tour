<?php
namespace app\admin\controller;
use think\Controller;

/**
* 只是为了方便查看一些样式
*/
class TemplateController extends Controller
{
    
    public function icons()
    {
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }
}
