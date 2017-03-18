<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\PictureModel;
use think\Config;
use think\File;
/**
* 图片管理
*/
class PictureController extends IndexController
{
    public function index()
    {	
    	//Config::set('app_trace', false);
    	//获取上传文件名
        $image = Request::instance()->file('file');
        var_dump($image);
        $info = $image->move(ROOT_PATH . 'public' . DS . 'upload');
        $PictureModel = new PictureModel;
        $PictureModel->path = '/tour/public/upload/' .date('Ymd'). '/'.$info->getFilename();
        $PictureModel->save();
        $response['url'] = $PictureModel->path;
        return $response['url'];
    }

    public function upload()
    {
    	//获取上传文件名
        $data = Request::instance()->param();
        var_dump($data);
    }

    public function delete()
    {
        $data = Request::instance()->param('name');
        var_dump($data);
        $image = Request::instance()->file();
        var_dump($image);
        $result = $image->buildSaveName($data);
        var_dump($result);

    }
}