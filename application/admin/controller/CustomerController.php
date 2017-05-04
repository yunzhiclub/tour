<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\CustomerModel;
use app\model\CollectionModel;
/**
* 客户管理
*/
class CustomerController extends IndexController
{
    
    public function index()
    {
        //获取查询名称
        $name = input('name');

        //模糊查询
        $CustomerModel =  new CustomerModel;
        $map['is_delete'] = 0;
        $CustomerModels = $CustomerModel->where($map)->where('nick_name', 'like', '%'. $name. '%')->paginate();

        $this->assign('CustomerModels', $CustomerModels);

        return $this->fetch();
    }

    public function detail()
    {
        //获取被编辑信息
    	$id = Request::instance()->param('id');
        $CustomerModel = CustomerModel::get($id);
        //传到V层
        $this->assign('CustomerModel', $CustomerModel);
        return $this->fetch();
    }

    public function collection()
    {
        //获取传入的客户信息ID
        $customer_id = Request::instance()->param('customer_id');
        $CustomerModel = CustomerModel::get($customer_id);
        $this->assign('CustomerModel', $CustomerModel);
       //模糊查询符合客户要求的收藏
        $CollectionModel = new CollectionModel;
        $map['customer_id'] = $customer_id;
        $CollectionModels = $CollectionModel->where($map)->paginate();
        $this->assign('CollectionModels', $CollectionModels);
        return $this->fetch();
    }
    public function status()
    {
        //获取要操作的信息
        $id = Request::instance()->param('id');
        $CustomerModel = CustomerModel::get($id);
        //判断状态如果为0（正常）变为1（冻结）
        if($CustomerModel->status === 0) $CustomerModel->status = 1;
        else $CustomerModel->status = 0;

        //保存
        if (false === $CustomerModel->save()) {
            return $this->error($CustomerModel->getError());
        }
        return $this->success('操作成功', url('index1'));
        
        
        
   }
    
}