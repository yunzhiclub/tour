<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\RegionModel;              //地区管理
/**
 * 地区管理
 * @author zhangmengxiang
 */
 
 class RegionController extends IndexController
 {
    public function index()
    {	
    	//获取地区名字
    	$regionname=input('get.regionname');
    	//模糊查询
    	$RegionModel= new RegionModel;
    	$is_show['is_delete'] = 0;//数据库字段is_delete为0时显示
    	 $regions = $RegionModel->where($is_show)->where('regionname', 'like', '%' . $regionname . '%')->paginate(10);

        $this->assign('regions',$regions);
        return $this->fetch();
    }
 	public  function add()
 	{
 		return $this->fetch();
 	}
 	public function edit()
 	{
 		//获取所编辑的地区信息
 		$id = Request::instance()->param('id');
 		$RegionModel =RegionModel::get($id);

 		$this->assign('RegionModel',$RegionModel);
 		return $this->fetch();
 	}
 	public function delete()
 	{
 		//获取要删掉的地区的信息
 		$id= Request::instance()->param('id');
 		$RegionModel =RegionModel::get($id);
 		//将要删除的地区的数据库字段名id_delete改为1（0将在主页显示）
 		$RegionModel->is_delete = 1;

 		if (false === $RegionModel->save()) 
 		{
 			return $this->error($RegionModel->getError());
 		}
 		return $this->success('删除成功！');


 	}
 	public function save()
 	{
 		$data=Request::instance()->param();
 		$RegionModel=new RegionModel;
 		
 		
 		if ( false === $RegionModel->save($data)) {

 			return $this-error('保存失败，请重新添加！',url('add'));
 		}

 		return $this->success('保存成功！',url('index'));
	}
	public function update()
	{
		$data = Request::instance()->param();
    	
    	$RegionModel = RegionModel::get($data['id']);
    	if (false === $RegionModel->isUpdate()->save($data)) {
    		return $this->error($RegionModel->getError());
    	}

    	return $this->success('操作成功', url('index'));
	}	
 }
