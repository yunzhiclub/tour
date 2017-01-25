<?php
namespace app\admin\controller;
use think\Controller;
/**
* 用户管理
*/
class UserController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}