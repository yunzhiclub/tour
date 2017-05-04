<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\HomeRegionModel;
use app\model\RegionModel;

class  HomeRegionController extends IndexController
{
	public function index()
	{
		//获取信息
		$data = input('get.');
		//模糊查询
		$HomeRegionModel = new HomeRegionModel;
		//为查询下拉框显示全部信息
		$map['is_delete'] = 0;
        $HomeRegionModelAll = $HomeRegionModel ->where($map)->select();
        //设置多条件查询
		$HomeRegionModels = $HomeRegionModel->getSearchInfo($data)->paginate();
		$this->assign('HomeRegionModels', $HomeRegionModels);
		$this->assign('HomeRegionModelAll', $HomeRegionModelAll);
 		return $this->fetch();
	}
	public function edit()
	{   //获取要编辑的ID
		$id = Request::instance()->param('id');
		//向editV层传递区域表信息（显示所有未删除的区域名称）
		$RegionModel = new RegionModel;
		$map['is_delete'] = 0;
		$RegionModels = $RegionModel->where($map)->select();
		$HomeRegionModel = HomeRegionModel::get($id);
		$this->assign('HomeRegionModel', $HomeRegionModel);
		$this->assign('RegionModels', $RegionModels);

		return $this->fetch();
	}
	public function add()
	{
		//获取区域信息
		$RegionModel = new RegionModel;
		$map['is_delete'] = 0;

		$RegionModels = $RegionModel->where($map)->select();

		$this->assign('RegionModels', $RegionModels);
		
		return $this->fetch();
	}
	public function delete()
	{
		$id = Request::instance()->param('id');
		$HomeRegionModel = HomeRegionModel::get($id);
		$HomeRegionModel->is_delete = 1;
		if( false === $HomeRegionModel->save()){
			return $this->error($HomeRegionModel->getError());
		}
		return $this->success('删除成功');
	}
	public function save()
	{
		$data = Request::instance()->param();
		$HomeRegionModel = new HomeRegionModel;
		if(false === $HomeRegionModel->save($data)){
			return $this->error($HomeRegionModel->getData());
		}
		return $this->success('添加成功', url('index1'));
	}
	public function update()
	{
		$data = Request::instance()->param();
		$HomeRegionModel = HomeRegionModel::get($data['id']);
		if(false === $HomeRegionModel->isUpdate()->save($data)){
			return $this->error($HomeRegionModel->getError());
		}

		return $this->success('操作成功', url('index1'));
	}

}