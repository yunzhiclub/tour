<?php
namespace app\model;
use think\Model;
/**
 * 图片管理
 * @author huangshuaibin
 */
class PictureModel extends Model
{
	/**
	 * 保存图片数据
	 * @param  array $data 保存图片时的name,type信息
	 * @param  object $file 保存图片信息缓冲区的对象
	 * @return bool       true or false
	 */
	public static function saveDate($data, $file)
	{
		//将图片移动到指定文件夹下
		$info = $file->move(ROOT_PATH . 'public' . DS . 'upload' . DS . 'admin');
		$PictureModel = new PictureModel;
		
		$PictureModel->name = $data['name'];
		$PictureModel->type = $data['type'];

		//保存图片的URL
		$PictureModel->img_url = $info->getSaveName();
		
		$PictureModel->save();

		//判断保存是否成功
		if (is_null($info))
		{
			return false;
		}

		return true;
	}
	/**
	 * 软删除图片以及相关信息
	 * @param  int $id 图片对象的id
	 * @return bool     true or false
	 */
	public static function falseDelete($id)
	{
		$PictureModel = PictureModel::get($id);

		//is_delete=1代表删除
		$PictureModel->is_delete = 1;
		if (false === $PictureModel->save()) {
			return false;
		}

		return true;
	}
}