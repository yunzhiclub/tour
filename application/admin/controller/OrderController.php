<?php
namespace app\admin\controller;
use think\Controller;
/**
* 订单管理
*/
class OrderController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
    public function edit()
    {
    	return $this->fetch();
    }
}