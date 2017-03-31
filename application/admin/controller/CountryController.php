<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\DestinationCityModel;
use app\model\CountryModel;

class CountryController extends IndexController
{
	public function index()
	{
		//获取要编辑的国家ID
		$region_id = Request::instance()->param('id');
		$this->assign('region_id', $region_id);
		//获取查询名称
		$name = input('name');

		//模糊查询
		$CountryModel = new CountryModel;
		$map['is_delete'] = 0;
		$map['region_id'] = $region_id;
		$CountryModels = $CountryModel->where($map)->where('name','like','%'.$name.'%')->paginate();
		//向V层传递
		$this->assign('CountryModels', $CountryModels);

		return $this->fetch();
	}
	public function edit()
	{
		//获取要编辑的国家信息
		$id = Request::instance()->param('id');
		$CountryModel = CountryModel::get($id);
		
		$this->assign('CountryModel', $CountryModel);
		return $this->fetch();
	}
	public function add()
	{
		$region_id = Request::instance()->param('region_id');
		
		$this->assign('region_id', $region_id);
		return $this->fetch();
	}
	public function delete()
	{
		$id = Request::instance()->param('id');
		$CountryModel = CountryModel::get($id);

		//判断该国家是否为某目的城市的国家
		if(false === $CountryModel->isXXXDestinationCity()){
			return $this->error('该城市包含某目的城市');
		}
		$CountryModel->is_delete = 1;
		if(false === $CountryModel->save() ){
			return $this->error($CountryModel->getError());
		}
		return $this->success('删除成功');

	}
	public function save()
	{
		$data = Request::instance()->param();
		$CountryModel = new CountryModel;
		if(false === $CountryModel->save($data)){
			return $this->error($CountryModel->getData());
		}
		return $this->success('添加成功', url('index'));

	}
	public function update()
	{
		$data = Request::instance()->param();

		$CountryModel = CountryModel::get($data['id']);
		if(false === $CountryModel->isUpdate()->save($data)){
			return $this->error($CountryModel->getError());
		}

		return $this->success('操作成功', url('index'));

	}


}