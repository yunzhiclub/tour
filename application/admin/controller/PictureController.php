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
    /**
     * 图片管理首页
     * @author huangshuaibin 
     */
    public function index()
    {
        $PictureModel = new PictureModel;
        //分页数为10
        $pictures = $PictureModel->where('is_delete', '=', 0)->paginate(10);
        $this->assign('pictures', $pictures);
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

}
