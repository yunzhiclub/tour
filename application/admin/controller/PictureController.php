<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\PictureModel;
use think\Config;
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
        Config::set('app_trace', false);
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
        $data = Request::instance()->param(
            );
        //获取图片
        $PictureModels = PictureModel::getPictureModels($data);
        $this->assign('PictureModels', $PictureModels);

        //获取图片标题
        $title = PictureModel::getTitleById($data);
        $this->assign('title', $title);
        
        return $this->fetch();
    }

    //通过对象id获取关联的图片。例：根据目的地城市对象id获取图片目的地城市模型中的信息，然后根据信息中的picture_id获取图片
    public function getRelationPicturesByXxxModelId()
    {
        $data = Request::instance()->param();
        $relationPictures = PictureModel::getRelationPicturesByXxxModelId($data);

        return json_encode($relationPictures);
    }

    public function deletePicture()
    {
        $data = Request::instance()->param();

        $result = PictureModel::deletePicture($data);

        return $result;
    }

}