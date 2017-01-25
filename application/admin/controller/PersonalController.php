<?php
namespace app\admin\controller;
use think\Controller;
/**
* 个人中心管理
*/
class PersonalController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
}