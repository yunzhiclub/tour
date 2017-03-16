<?php
namespace app\model;

/**
 * 图片管理
 * @author huangshuaibin
 */
class PictureModel extends ModelModel
{
	public static function saveFile($file)
	{
		//将图片移动到指定文件夹下
		$info = $file->move(ROOT_PATH . 'public' . DS . 'upload' . DS . 'admin');
		
		return $info;
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
