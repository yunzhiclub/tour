<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
/**
* 图片管理
*/
class PictureController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
    public function add()
    {

    	return $this->fetch();
    }
    public function edit()
    {
    	return $this->fetch();
    }
    public function upload()
    {
        $data = Request::instance()->param();

        $file = request()->file('image');
        
        $info = $file->move(ROOT_PATH . 'public' . DS . 'upload' . DS . 'admin');
        $info->getFilename();
        $file->getError();
        if ($info) {
            return $this->success('保存成功', url('index'));
        } else {
            return $this->error('请上传图片', url('add'));
        }
    }
}