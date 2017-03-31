<?php
namespace app\admin\controller;
use think\Controller;
use app\model\OrderModel;
use think\Request;

/**
* 订单管理
*/
class OrderController extends IndexController
{
    
    public function index()
    {
        $OrderModel = new OrderModel;

        // 模糊查询
        $number = Request::instance()->get('number');
        $OrderModels = $OrderModel->where('number', 'like', '%' . $number . '%')->paginate();
        $this->assign('OrderModels', $OrderModels);
        return $this->fetch();
    }
    
    public function detail()
    {
    	return $this->fetch();
    }
    

}
