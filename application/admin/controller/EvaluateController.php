<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\model\EvaluateModel;
use app\model\RouteModel;
/**
* 评价管理
*/
class EvaluateController extends IndexController
{
    
    public function index()
    {
    	//获取查询名称
        $name = input('get.name');

        //模糊查询
        $RouteModel = new RouteModel;
        $map['is_delete'] = 0;
        $RouteModels = $RouteModel->where($map)->where('name', 'like', '%' . $name . '%')->paginate();

    	$this->assign('RouteModels', $RouteModels);
        return $this->fetch();
    }

    public function detail()
    {
    	$id = Request::instance()->param('id');

    	//获取路线名称
    	$routeName = RouteModel::get($id)->getData('name');

    	//获取路线对应的评价
    	$EvaluateModel = new EvaluateModel;
    	$map['is_delete'] = 0;
    	$map['route_id'] = $id;
    	$EvaluateModels = $EvaluateModel->where($map)->select();

    	//传值
    	$this->assign('routeName', $routeName);
    	$this->assign('EvaluateModels', $EvaluateModels);

        return $this->fetch();
    }

    public function delete()
    {
    	$id = Request::instance()->param('id');

    	//删除数据
    	$EvaluateModel = EvaluateModel::get($id);
    	$EvaluateModel->is_delete = 1;

    	if (false === $EvaluateModel->save()) {
    		return $this->error($EvaluateModel->getError());
    	}

    	return $this->success('删除成功');
    }
}