<?php
namespace app\admin\controller;
use think\Controller;
/**
* 幻灯片管理
*/
class SlidershowController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
}