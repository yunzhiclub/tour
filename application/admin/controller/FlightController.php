<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\FlightModel;              //航班管理
use app\model\StartCityModel;           //出发城市
use app\model\DestinationCityModel;     //目的地城市
/**
* 航班管理
* @author chuhang 
*/
class FlightController extends IndexController
{
    
    public function index()
    {
    	//获取查询到航班号
        $number = input('get.number');
        
        //模糊查询
        $FlightModel = new FlightModel;
        $map['is_delete'] = 0;
        $FlightModels = $FlightModel->where($map)->where('number', 'like', '%' . $number . '%')->paginate();

        $this->assign('FlightModels', $FlightModels);

        return $this->fetch();
    }

    public function edit()
    {
    	//获取所编辑的航班信息
    	$id = Request::instance()->param('id');
    	$FlightModel = FlightModel::get($id);

    	//获取出发城市、目的城市信息
    	$StartCityModels = StartCityModel::all();
    	$DestinationCityModels = DestinationCityModel::all();

    	$this->assign('StartCityModels', $StartCityModels);
    	$this->assign('DestinationCityModels', $DestinationCityModels);
    	$this->assign('FlightModel', $FlightModel);

    	return $this->fetch();
    }

    public function delete()
    {
    	$id = Request::instance()->param('id');
    	
    	//删除数据
    	$FlightModel = FlightModel::get($id);
    	$FlightModel->is_delete = 1;

    	if (false === $FlightModel->save()) {
    		return $this->error($FlightModel->getError());
    	}

    	return $this->success('删除成功');
    }

    public function add()
    {
    	//获取出发城市、目的城市信息
    	$StartCityModels = StartCityModel::all();
    	$DestinationCityModels = DestinationCityModel::all();

    	$this->assign('StartCityModels', $StartCityModels);
    	$this->assign('DestinationCityModels', $DestinationCityModels);

    	return $this->fetch();
    }

    public function save()
    {
    	$data = Request::instance()->param();

    	$FlightModel = new FlightModel;
    	if (false === $FlightModel->save($data)) {
    		return $this->error($FlightModel->getError());
    	}

    	return $this->success('保存成功', url('index1'));
    }

    public function update()
    {
    	$data = Request::instance()->param();
    	
    	$FlightModel = FlightModel::get($data['id']);
    	if (false === $FlightModel->isUpdate()->save($data)) {
    		return $this->error($FlightModel->getError());
    	}

    	return $this->success('操作成功', url('index1'));
    }
}