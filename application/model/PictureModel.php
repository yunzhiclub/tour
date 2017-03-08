<?php
namespace app\model;
use think\Model;

class PictureModel extends Model
{
	public static function saveDate($data, $file)
	{
		$info = $file->move(ROOT_PATH . 'public' . DS . 'upload' . DS . 'admin');
		$PictureModel = new PictureModel;
		
		$PictureModel->name = $data['name'];
		$PictureModel->type = $data['type'];

		$PictureModel->img_url = $info->getSaveName();
		
		$PictureModel->save();

		if (is_null($info))
		{
			return false;
		}

		return true;
	}
}