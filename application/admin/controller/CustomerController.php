<?php
namespace app\admin\controller;
use think\Controller;
/**
* 客户管理
*/
class CustomerController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}