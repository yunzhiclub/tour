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

    public function delete()
    {
        // 获取要删除的id值
        $id = Request::instance()->param('id/d');

        if (is_null($id) || 0 === $id){
            return $this->error('未获取到ID信息');
        }

        // 获取要删除的订单对象
        $OrderModel = OrderModel::get($id);
        $OrderModel->is_delete = 1;

        // 要删除的对象不存在
        if (is_null($OrderModel)){
            return $this->error('不存在ID为'. $id . '的订单');
        }

        // 删除订单
        if (!$OrderModel->delete()){
            return $this->error('删除失败:' . $OrderModel->getError());
        }

        // 删除成功 跳转
        return $this->success('删除成功', url('index'));
    }

}
