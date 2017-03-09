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
    /**
     * 上传图片保存
     * @author huangshuaibin 
     * @return [type] [description]
     */
    public function upload()
    {
        $flag = false;  //判断图片调用方法是否成功的标记
        $file = request()->file('image');
        $data = Request::instance()->param();

        //上传图片返回false
        if (!is_null($file)) {
            $flag = PictureModel::saveDate($data, $file);
        }
        if (!$flag) {
            return $this->error('图片上传失败', url('add'));
        }

        return $this->success('图片上传成功', url('index'));
    }

    //删除图片数据
    public function delete()
    {
        $id = Request::instance()->param('id/d');

        //调用软删除方法,判断是否删除成功,将is_delete赋值为1
        if (false === PictureModel::falseDelete($id)) {
            return $this->error('删除失败');
        }

        return $this->success('删除成功', url('index'));
    }

}
