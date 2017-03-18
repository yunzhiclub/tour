<?php
namespace app\admin\controller;

use think\Controller;
use app\model\HotelModel;           //酒店管理
use think\Request;
/**
* 酒店管理
* @author chuhang 
*/
class HotelController extends IndexController
{
    
    public function index()
    {
        //获取查询到的名字
        $title = input('get.title');

        //模糊查询
        $HotelModel = new HotelModel;
        $map['is_delete'] = 0;
        $HotelModels = $HotelModel->where($map)->where('title', 'like', '%' . $title . '%')->paginate();

        $this->assign('HotelModels', $HotelModels);
        return $this->fetch();
    }

    public function add()
    {
        return $this->fetch();
    }

    public function edit()
    {
        $id = Request::instance()->param('id');
        $HotelModel = HotelModel::get($id);

        $this->assign('HotelModel', $HotelModel);
        return $this->fetch();
    }

    public function detail()
    {
        $id = Request::instance()->param('id');
        $HotelModel = HotelModel::get($id);

        $this->assign('HotelModel', $HotelModel);
        return $this->fetch();
    }

    public function save()
    {
        $data = Request::instance()->param();

        $HotelModel = new HotelModel;
        if (false === $HotelModel->save($data)) {
            return $this->error($HotelModel->getError());
        }

        return $this->success('保存成功', url('index'));
    }

    public function delete()
    {
        $id = Request::instance()->param('id');
        $HotelModel = HotelModel::get($id);

        //判断该酒店是否为某路线的入住酒店
        if (false === HotelModel::isXXXRouteCheckInHotel($id)) {
            return $this->error('该酒店为某路线的入住酒店');
        }
        //删除数据
        $HotelModel->is_delete = 1;
        if (false === $HotelModel->save()) {
            return $this->error($HotelModel->getError());
        }

        return $this->success('删除成功');
    }

    public function update(){
        $data = Request::instance()->param();
        $HotelModel = HotelModel::get($data['id']);
        
        if (false === $HotelModel->isUpdate()->save($data)) {
            return $this->error($HotelModel->getError());
        }

        return $this->success('操作成功', url('index'));
    }
}