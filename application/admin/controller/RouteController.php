<?php
namespace app\admin\controller;
use think\Controller;
use app\model\RouteModel;
/**
* 路线管理
*/
class RouteController extends IndexController
{
    
    public function index()
    {
            //获取查询到航班号
            $name = input('get.name');

            //模糊查询
            $RouteModel = new RouteModel;
            $map['is_delete'] = 0;
            $RouteModels = $RouteModel->where($map)->where('name', 'like', '%' . $name . '%')->paginate();

            $this->assign('RouteModels', $RouteModels);
        return $this->fetch();
    }
    public function add()
    {
        $basicInfo = RouteModel::getBasicInfo();
        $this->assign('basicInfo', $basicInfo);
    	return $this->fetch();
    }
    public function edit()
    {
        $basicInfo = RouteModel::getBasicInfo();
        $this->assign('basicInfo', $basicInfo);
    	return $this->fetch();
    }
    public function detail() 
    {
        return $this->fetch();
    }
}