<?php
namespace app\admin\controller;
use think\Controller;
use app\model\HomeCityModel;
use app\model\DestinationCityModel;           //酒店管理
use think\Request;
/**
* 首页城市
* @author zhangmengxiang
*/
class HomeCityController extends IndexController
{
    
    public function index()
    {
    	//获取查询
    	$data = input('get.');

    	//模糊查询
		
		$HomeCityModel = new  HomeCityModel;
		//为查询下拉框显示全部信息
		$map['is_delete'] = 0;
        $HomeCityModelAll = $HomeCityModel ->where($map)->select();
        //设置多条件查询
		$HomeCityModels = $HomeCityModel->getSearchInfo($data)->paginate();
		//向V层传递
        $this->assign('HomeCityModels', $HomeCityModels);
		$this->assign('HomeCityModelAll', $HomeCityModelAll);
		return $this->fetch();

        
    }
    public function add()
	{
		//获取目的城市信息
        $DestinationCityModel = new DestinationCityModel;
        $map['is_delete'] = 0;
		$DestinationCityModels = $DestinationCityModel->where($map)->select();

		$this->assign('DestinationCityModels', $DestinationCityModels);
		return $this->fetch();
	}
	 public function save()
    {
        $data = Request::instance()->param();
		$HomeCityModel = new HomeCityModel;
		if(false === $HomeCityModel->save($data)){
			return $this->error($HomeCityModel->getData());
		}
		return $this->success('添加成功', url('index'));
    }
     public function update() 
    {
        $data = Request::instance()->param();

        $HomeCityModel = HomeCityModel::get($data['id']);
        if (false === $HomeCityModel->isUpdate()->save($data)) {
            return $this->error($HomeCityModel->getError());
        }
        return $this->success('操作成功', url('index'));
    }
    public function edit()
    {   //获取要编辑的ID
    	$id = Request::instance()->param('id');
        //向editV层传递目的城市表信息（显示所有未删除的目的城市名称）
		$DestinationCityModels = new DestinationCityModel;
		$map['is_delete'] = 0;
		$DestinationCityModels = $DestinationCityModels->where($map)->select();
		$HomeCityModel = HomeCityModel::get($id);
		$this->assign('HomeCityModel', $HomeCityModel);
		$this->assign('DestinationCityModels', $DestinationCityModels);
		return $this->fetch();

    }
    public function delete()
    {
    	$id = Request::instance()->param('id');
        $HomeCityModel = HomeCityModel::get($id);
        $HomeCityModel->is_delete = 1;
       if (false === $HomeCityModel->save()) {
            return $this->error($HomeCityModel->getError());
        }
        return $this->success('删除成功');
    }
    
}
