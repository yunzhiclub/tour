<?php
namespace app\admin\controller;
use think\Controller;
/**
* 客户管理
*/
class CustomerController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
    public function edit()
    {
    	return $this->fetch();
    }
    public function detail()
    {
    	return $this->fetch();
    }
}