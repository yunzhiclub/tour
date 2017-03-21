<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\PictureModel;
/**
* 图片管理
*/
class PictureController extends IndexController
{
    public function index()
    {
        $this->fetch();
    }
    public function upload()
    {
    	//获取上传图片
        $Picture = Request::instance()->file('file');
        //保存图片
        $result = PictureModel::savePicture($Picture);

        return $result;
    }

    public function delete()
    {
        $name = Request::instance()->param('name');

        //根据图片名称获取该图片
        $PictureModel = PictureModel::getPictureByPictureName($name);

        //如果图片不存在，说明图片为上传
        if ($PictureModel === null) {
            return;
        }

        //删除图片
        $PictureModel->is_delete = 1;
        $result = $PictureModel->save();

        return $PictureModel->getData('id');


    }

    //获取所有图片名字
    public function getAllPictureNames()
    {
        $AllPictureNames = PictureModel::getAllPictureNames();
        
        return $AllPictureNames;
    }

    public function detail()
    {
        return $this->fetch();
    }

    public function getRelationPicturesByXxxModelId()
    {
        $data = Request::instance()->param();
        $relationPictures = PictureModel::getRelationPicturesByXxxModelId($data);
        
        var_dump($data);
    }

}