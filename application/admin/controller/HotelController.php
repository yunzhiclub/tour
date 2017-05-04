<?php
namespace app\admin\controller;

use think\Controller;
use app\model\HotelModel;           //酒店管理
use think\Request;
use app\model\PictureModel;         //图片
/**
* 酒店管理
* @author chuhang 
*/
class HotelController extends IndexController
{
    
    public function index()
    {
        //获取查询到的名字
        $name = input('get.name');

        //模糊查询
        $HotelModel = new HotelModel;
        $map['is_delete'] = 0;
        $HotelModels = $HotelModel->where($map)->where('name', 'like', '%' . $name . '%')->paginate();

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
        //去除pictureIds字段
        $pictureIds = current(array_splice($data, 4, 1));

        $HotelModel = new HotelModel;
        if (false === $HotelModel->save($data)) {
            return $this->error($HotelModel->getError());
        }

        //将图片、酒店关联并存入到Picture_hotel表中
        if ($pictureIds !== null) {
            $saveRelationPictures = PictureModel::saveRelationPictures($HotelModel, $pictureIds);
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
        //去除pictureIds字段
        $pictureIds = current(array_splice($data, 5, 1));
        $HotelModel = HotelModel::get($data['id']);
        
        if (false === $HotelModel->isUpdate()->save($data)) {
            return $this->error($HotelModel->getError());
        }

        //将图片、酒店关联并存入到Picture_hotel表中
        if ($pictureIds !== null) {
            $saveRelationPictures = PictureModel::saveRelationPictures($HotelModel, $pictureIds);
        }

        return $this->success('操作成功', url('index'));
    }
}