<?php
namespace app\admin\controller;
use think\Controller;
/**
* 订单管理
*/
class OrderController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}