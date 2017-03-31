<?php
namespace app\admin\controller;
use think\Controller;
use app\model\OrderModel;
/**
* 订单管理
*/
class OrderController extends IndexController
{
    
    public function index()
    {
        $OrderModel = new OrderModel;
        $OrderModels = $OrderModel->paginate();
        $this->assign('OrderModels', $OrderModels);
        return $this->fetch();
    }
    
    public function detail()
    {
    	return $this->fetch();
    }
    

}
