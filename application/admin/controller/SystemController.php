<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\ConfigModel;//系统设置
/**
* 系统设置
* @author zhangmengxiang
*/
class SystemController extends IndexController
{
    
    public function index()
    {
        //获取查询名称
        $name = input('name');

        //模糊查询
        $ConfigModel = new ConfigModel;
        $map['is_delete'] = 0;
        $ConfigModels = $ConfigModel->where($map)->where('title','like','%'.$name.'%')->paginate();
        //向V层传递
        $this->assign('ConfigModels',$ConfigModels);
        return $this->fetch();

    }

    public function add()
    {
    	return $this->fetch();
    }

    public function edit() 
    {
        //获取所需要编辑的标题
        $id = Request::instance()->param('id');
        $ConfigModel = ConfigModel::get($id);

        $this->assign('ConfigModel',$ConfigModel);
    	return $this->fetch();
    }
    public function delete()
    {
        //获取所需要删除的标题
        $id = Request::instance()->param('id');
        $ConfigModel = ConfigModel::get($id);
        //判断是否为空
        if(is_null($ConfigModel)){
            return $this->error($ConfigModel->getError());
        }
        //判断是否删除成功
        if(!$ConfigModel->delete()){
            return $this->error($ConfigModel->getError());
        }

        return $this->success('删除成功', url('index1'));

    }
    public function content()
    {
        $id = Request::instance()->param('id');
        $ConfigModel = ConfigModel::get($id);
        $this->assign('ConfigModel',$ConfigModel);
        return $this->fetch();
    }
    public function save()
    {
        $data = Request::instance()->param();

        $ConfigModel = new ConfigModel;
        if(false === $ConfigModel->save($data)){
            return $this->error($ConfigModel->getError());
        }

        return $this->success('保存成功', url('index1'));
    }
    public function update()
    {
        $data = Request::instance()->param();

        $ConfigModel = ConfigModel::get($data['id']);
        if(false === $ConfigModel->isUpdate()->save($data)){
            return $this->error($ConfigModel->getError());
        }

        return $this->success('操作成功', url('index1'));
    }
}