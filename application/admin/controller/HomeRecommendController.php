<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\HomeRecommendModel;
use app\model\RouteModel;

Class HomeRecommendController extends IndexController
{
	public function index()
	{
		//获取信息
		$data = input('get.');
		

		//模糊查询
		$HomeRecommendModel = new HomeRecommendModel;
		//为查询下拉框显示全部信息
		$map['is_delete'] = 0;
		$HomeRecommendModelAll = $HomeRecommendModel->where($map)->select();
		$this->assign('HomeRecommendModelAll', $HomeRecommendModelAll);
		//设置多条件查询
		$HomeRecommendModels = $HomeRecommendModel->getSearchInfo($data)->paginate();
		$this->assign('HomeRecommendModels', $HomeRecommendModels);
		return $this->fetch();
	}
	public function add()
	{	
		//将基础信息传入V层
		$basicInfo = HomeRecommendModel::getBasicInfo();
		$this->assign('basicInfo', $basicInfo);

		return $this->fetch();
	}
	public function edit()
	{
		//获取要编辑的ID
		$id = Request::instance()->param('id');
		//向editV层传递路线表信息（显示所有未删除的路线名称）
		$RouteModels = new RouteModel;
		$map['is_delete'] = 0;
		$RouteModels = $RouteModels->where($map)->select();
		$HomeRecommendModel = HomeRecommendModel::get($id);
		$this->assign('HomeRecommendModel', $HomeRecommendModel);
		$this->assign('RouteModels', $RouteModels);
		return $this->fetch();
	}
	 public function save()
    {
        $data = Request::instance()->param();
		$HomeRecommendModel = new HomeRecommendModel;
		if(false === $HomeRecommendModel->save($data)){
			return $this->error($HomeRecommendModel->getData());
		}
		return $this->success('添加成功', url('index1'));
    }
    public function update() 
    {
        $data = Request::instance()->param();

        $HomeRecommendModel = HomeRecommendModel::get($data['id']);
        if (false === $HomeRecommendModel->isUpdate()->save($data)) {
            return $this->error($HomeRecommendModel->getError());
        }
        return $this->success('操作成功', url('index1'));
    }
    public function delete()
    {
    	$id = Request::instance()->param('id');
        $HomeRecommendModel = HomeRecommendModel::get($id);
        $HomeRecommendModel->is_delete = 1;
       if (false === $HomeRecommendModel->save()) {
            return $this->error($HomeRecommendModel->getError());
        }
        return $this->success('删除成功');
    }
}