<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\model\DestinationCityModel;//目的城市
use app\model\CountryModel;//国家

/**
 * 目的城市管理
 * @author zhangmengxiang
 */
class DestinationcityController extends IndexController
{
	public function index()
	{
		//获取查询名称
		$name = input('name');

		//模糊查询
		$DestinationCityModel = new DestinationCityModel;
		$CountryModel = new CountryModel;
		$map['is_delete'] = 0;
		$DestinationCityModels = $DestinationCityModel->where($map)->where('name','like','%'.$name.'%')->paginate();
		//向V层传递
		$this->assign('DestinationCityModels', $DestinationCityModels);
		return $this->fetch();
	}
	public function add()
	{
		//获取国家信息
		$CountryModels = CountryModel::all();

		$this->assign('CountryModels', $CountryModels);
		return $this->fetch();
	}
	public function edit()
	{	
		//获取所需编辑的目的城市信息
		$id = Request::instance()->param('id');
		$DestinationCityModel = DestinationCityModel::get($id);

		//获取国家信息
		$CountryModels = CountryModel::all();

		$this->assign('CountryModels', $CountryModels);
		$this->assign('DestinationCityModel',$DestinationCityModel);
		return $this->fetch();
	}
	public function delete()
	{
		$id = Request::instance()->param('id');
		$DestinationCityModel = DestinationCityModel::get($id);

		//判断该目的城市是否为某航班的目的城市
		if (false === $DestinationCityModel->isXXXFlightStartCity()) {
            return $this->error('该城市为某航班的出发城市');
        }
		//判断该目的城市是否为某路线的目的城市
		if (false === $DestinationCityModel->isXXXRouteStartCity()) {
            return $this->error('该城市为某路线的出发城市');
        }
		//判断该目的城市是否为感兴趣目的地
		//删除数据
		$DestinationCityModel->is_delete = 1;
		if (false === $DestinationCityModel->save()) {
			return $this->error($DestinationCityModel->getError());
		}

		return $this->success('删除成功');		
	}
	public function save()
	{
		$data = Request::instance()->param();

		$DestinationCityModel = new DestinationCityModel;
		if(false === $DestinationCityModel->save($data)){
			return $this->error($DestinationCityModel->getError());
		}

		return $this->success('保存成功', url('index'));
	}
	public function update()
	{
		$data = Request::instance()->param();

		$DestinationCityModel = DestinationCityModel::get($data['id']);
		if(false === $DestinationCityModel->isUpdate()->save($data)){
			return $this->error($DestinationCityModel->getError());
		}

		return $this->success('操作成功', url('index'));
	}		
}