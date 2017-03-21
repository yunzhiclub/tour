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

		return $PictureModel->getData('id');
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

	/**
	 * 将图片、和图片关联的对象保存到对应的关联的表中
	 * @param  object $XXXModel   
	 * @param  json $pictureIds 图片的id
	 * @author chuhang 
	 */
	static public function saveRelationPictures($XXXModel, $pictureIds)
	{
		//获取model名称
		$getClassName = get_class($XXXModel);

		//获取与图片关联的model名称
		$PictureXXXModel = substr($getClassName, 0, 10) . 'Picture' . substr($getClassName, 10);
		
		//获取xxxModel的id，将json格式的id转化为数组
		$XXXModelId = $XXXModel->getData('id');
		$pictureIds = json_decode($pictureIds);

		$xxx_id = self::convertHump($getClassName);

		//将图片id和对象id上传到关联表中
		foreach ($pictureIds as $pictureId) {
			$data = [];
			$PictureXXXModel = new $PictureXXXModel;

			//存库
			$data['picture_id'] = $pictureId;
			$data[$xxx_id] = $XXXModelId;
			$PictureXXXModel->save($data);
		}

		return 'error';
	}

	/**
	 * 将命名转化为驼峰是写法，例：destinationDityModel转变为destination_city_id
	 * @param  string $name xxxModel
	 * @return string       xxx_id
	 * @author chuhang 
	 */
	static public function convertHump($name)
	{
		$tempName = strtolower(preg_replace('/((?<=[a-z])(?=[A-Z]))/', '_', substr($name, 10)));
		return substr($tempName, 0, -6) . '_id';
	}
}
