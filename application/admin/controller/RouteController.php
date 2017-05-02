<?php
namespace app\admin\controller;
use app\model\RouteModel;
use think\Request;
use app\model\PictureModel;         //图片
use app\model\PictureRouteModel;         //图片
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
        //获取路线信息并将时间戳转化为2016-09-30格式
        $RouteModel = RouteModel::get($id)->ConvertStrtotimeToDate();
        $this->assign('RouteModel',$RouteModel);

        //获取基本信息
        $basicInfo = RouteModel::getBasicInfo();
        $this->assign('basicInfo', $basicInfo);
        //获取其他信息，首页推荐权重、精选权重、路程天数及价格
        $otherInfo = RouteModel::getOtherInfo($id);
        $this->assign('otherInfo', $otherInfo);

    	return $this->fetch();
    }

    public function detail() 
    {
        $id = Request::instance()->param('id');
        $RouteModel = RouteModel::get($id)->ConvertStrtotimeToDate();
        $this->assign('RouteModel', $RouteModel);
        //获取其他信息，首页推荐权重、精选权重、路程天数及价格
        $otherInfo = RouteModel::getOtherInfo($id);
        //获取图片信息
        $PictureModels = PictureRouteModel::getPictureRouteModels($id);
        $this->assign('PictureModels', $PictureModels);
        $this->assign('otherInfo', $otherInfo);
        return $this->fetch();
    }

    public function save()
    {
        $data = Request::instance()->param();
        //将日期转化为时间戳格式
        $data = RouteModel::ConvertDateToStrtotime($data);
        //去除pictureIds字段
        $pictureIds = current(array_splice($data, -2, 1));
        //保存数据
        $RouteModel = RouteModel::saveRouteInfo($data);

        //将图片、路线关联并存入到Picture_route表中
        if ($pictureIds !== null) {
            PictureModel::saveRelationPictures($RouteModel, $pictureIds);
        }

        return $this->success('保存成功', url('index'));
    }

    //先删除，再更新数据
    public function update()
    {
        $data = Request::instance()->param();
        //将日期转化为时间戳
        $data = RouteModel::ConvertDateToStrtotime($data);
        //去除pictureIds字段
        $pictureIds = current(array_splice($data, -2, 1));
        //删除数据
        RouteModel::deleteRouteInfo($data['id']);
        $RouteModel = RouteModel::get($data['id']);
        if (false === $RouteModel->delete()) {
            return $this->error($RouteModel->getError());
        }
        //保存数据
        $id = array_shift($data);
        $RouteModel = RouteModel::updateRouteInfo($data, $id);
        //将图片、酒店关联并存入到Picture_hotel表中
        if ($pictureIds !== null) {
            PictureModel::saveRelationPictures($RouteModel, $pictureIds);
        }
       
        return $this->success('保存成功', url('index'));
    }

    public function delete()
    {
        $id = Request::instance()->param('id');
        //删除数据
        RouteModel::deleteRouteInfo($id);

        return $this->success('删除成功');
    }

}