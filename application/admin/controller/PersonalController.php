<?php
namespace app\admin\controller;
use think\Controller;
/**
* 个人中心管理
*/
class PersonalController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}