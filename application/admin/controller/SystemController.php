<?php
namespace app\admin\controller;
use think\Controller;
/**
* 系统设置
*/
class SystemController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
}