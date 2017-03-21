<?php
namespace app\model;

/**
 * 图片管理
 * @author huangshuaibin
 */
class PictureModel extends ModelModel
{
	/**
	 * 获取所有图片的名字并转化为json字符串
	 * @return json 所有的图片名字
	 * @author chuhang
	 */
	static public function getAllPictureNames()
	{
		//获取所有图片模型
		$PictureModel = new PictureModel;
		$map['is_delete'] = 0;
		$PictureModels = $PictureModel->where($map)->select();

		//获取所有图片名字
		$AllPictureNames = [];
		foreach ($PictureModels as $PictureModel) {
			$AllPictureNames[] = $PictureModel->getData('name');
		}

		//转化为json字符串
		$AllPictureNames = json_encode($AllPictureNames);
		
		return $AllPictureNames;
	}

	/**
	 * 保存图片
	 * @param  [object] $Picture [用户上传的图片]
	 * @return [json]          1为成功，反之
	 * @author chuhang 
	 */
	static public function savePicture($Picture) 
	{
		//将图片转移到public/upload下
		$info = $Picture->move(ROOT_PATH . 'public' . DS . 'upload');

		//存库,保存图片名称和路径
		$PictureModel = new PictureModel;
		$data['name'] = $Picture->getInfo()['name'];
		$data['path'] = '/tour/public/upload/' .date('Ymd'). '/'.$info->getFileName();
		$result = $PictureModel->save($data);

		return json_encode($result);
	}

	/**
	 * 根据图片名称获取图片
	 * @param  string $name 图片名称
	 * @return Object       取得的图片
	 */
	static public function getPictureByPictureName($name)
	{
		$PictureModel = new PictureModel;
        $map['name'] = $name;
        $map['is_delete'] = 0;
        $PictureModel = $PictureModel->where($map)->find();

        return $PictureModel;
	}
}
