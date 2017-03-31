<?php
namespace app\admin\controller;
use think\Controller;
use app\model\RouteModel;
use think\Request;
/**
* 路线管理
*/
class RouteController extends IndexController
{
    
    public function index()
    {
        //获取查询到航班号
        $data = input('get.');
        //显示出发城市和目的地城市，用于查询
        $basicInfo = RouteModel::getBasicInfo();

        //模糊查询
        $RouteModel = new RouteModel;
        $RouteModels = $RouteModel->getSearchInfo($data)->paginate();

        $this->assign('RouteModels', $RouteModels);
        $this->assign('basicInfo', $basicInfo);

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
        //获取所需要编辑的标题
        $id = Request::instance()->param('id');
        $RouteModel = RouteModel::get($id);
        //获取基本信息
        $basicInfo = RouteModel::getBasicInfo();
        $this->assign('basicInfo', $basicInfo);
        //获取其他信息，首页推荐权重、精选权重、路程天数及价格
        $otherInfo = RouteModel::getOtherInfo($id);
        $this->assign('otherInfo', $otherInfo);
        

        $this->assign('RouteModel',$RouteModel);
    	return $this->fetch();
    }
    public function detail() 
    {
        return $this->fetch();
    }

    public function save()
    {
        $data = Request::instance()->param();
        
        if (false === RouteModel::saveRouteInfo($data)) {
            return $this->error('保存失败');
        }

        return $this->success('保存成功', url('index'));
    }

}