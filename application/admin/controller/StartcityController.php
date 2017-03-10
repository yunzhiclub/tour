<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\model\StartCityModel;       //出发城市
class StartcityController extends IndexController
{
	public function index()
    {
        //获取查询名称
        $name = input('get.name');

        //模糊查询
        $StartCityModel = new StartCityModel;
        $map['is_delete'] = 0;
        $StartCityModels = $StartCityModel->where($map)->where('name', 'like', '%' . $name . '%')->paginate();

        $this->assign('StartCityModels', $StartCityModels);

        return $this->fetch();
    }
   
    public function add()
    {
    	return $this->fetch();
    }
    public function edit()
    {
        //获取所编辑的信息
        $id = Request::instance()->param('id');

        $StartCityModel = StartCityModel::get($id);
        $this->assign('StartCityModel', $StartCityModel);

    	return $this->fetch();
    }
    public function update() 
    {
        $data = Request::instance()->param();

        $StartCityModel = StartCityModel::get($data['id']);
        if (false === $StartCityModel->isUpdate()->save($data)) {
            return $this->error($StartCityModel->getError());
        }
        return $this->success('操作成功', url('index'));
    }

    public function save() 
    {
        $data = Request::instance()->param();

        $StartCityModel = new StartCityModel;
        if (false === $StartCityModel->save($data)) {
            return $this->error($StartCityModel->getError());
        }
        
        return $this->success('操作成功', url('index'));
    }

    public function delete()
    {
        $id = Request::instance()->param('id');
        $StartCityModel = StartCityModel::get($id);

        //判断该出发城市是否为某航班的出发城市
        if (false === $StartCityModel->isFlightStartCity()) {
            return $this->error('该城市为某航班的出发城市');
        }
        //判断该出发城市是否为某路线出发城市
        if (false === $StartCityModel->isRouteStartCity()) {
            return $this->error('该城市为某路线的出发城市');
        }
        //删除数据
        $StartCityModel->is_delete = 1;
        if (false === $StartCityModel->save()) {
            return $this->error($StartCityModel->getError());
        }

        return $this->success('删除成功');
    }
}