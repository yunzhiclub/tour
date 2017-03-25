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
		$PictureXXXModel = self::getRelationModel($getClassName);
		
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

		return;
	}

	/**
	 * 将命名转化为驼峰是写法，例：app\model\DestinationCityModel转变为destination_city_id
	 * @param  string $name xxxModel
	 * @return string       xxx_id
	 * @author chuhang 
	 */
	static public function convertHump($name)
	{
		$tempName = strtolower(preg_replace('/((?<=[a-z])(?=[A-Z]))/', '_', substr($name, 10)));
		return substr($tempName, 0, -6) . '_id';
	}

	/**
	 * 通过对象id获取关联的图片。例：根据目的地城市对象id获取图片目的地城市模型中的信息，然后根据信息中的picture_id获取图片
	 * @param  array $data 对象id和model名称
	 * @return array       PictureModel数组
	 * @author chuhang 
	 */
	static public function getRelationPicturesByXxxModelId($data)
	{
		$XxxModel = self::getRelationModel($data['model']);

		$PictureXxxModel = substr($XxxModel, 10);

		$xxx_id = self::convertHump($data['model']);

		//获取图片id
		$map = [];
		$map[$xxx_id] = (int)$data['id'];
		$map['is_delete'] = 0;

		$PictureXxxModel = 'app\model' . DS . "$PictureXxxModel";
		$PictureXxxModel = new $PictureXxxModel;
		$PictureXxxModels = $PictureXxxModel->where($map)->select();
		
		//根据图片id获取图片信息
		$results = [];
		foreach ($PictureXxxModels as $PictureXxxModel) {
			$pictureId = $PictureXxxModel->getData('picture_id');
			//判断是否存在该图片
			$map = [];
			$map['id'] = $pictureId;
			$map['is_delete'] = 0;
			if (null !== PictureModel::get($map)) {
				$results[] = PictureModel::get($pictureId);
			}
		}
		return $results;
	}

	/**
	 * 删除图片及与图片关联的表的信息
	 * @param  [array] $data [图片信息]
	 * @author chuhang 
	 */
	static public function deletePicture($data)
	{
		//删除picture表中的图片
		$PictureModel = PictureModel::get($data['pictureId']);
		$PictureModel->is_delete = 1;
		$PictureModel->save();
		
		//删除关联表的数据，如PictureDestinationCityModel
		$PictureXxxModel = substr(self::getRelationModel($data['model']), 10);

		$PictureXxxModel = 'app\model' . DS . "$PictureXxxModel";

		//获取查询条件
		$map['picture_id'] = $data['pictureId'];
		$xxx_id = self::convertHump($data['model']);
		$map[$xxx_id] = $data['id'];

		//删除数据
		$PictureXxxModel = $PictureXxxModel::get($map);
		if ($PictureXxxModel !== null) {
			$PictureXxxModel->is_delete = 1;
			$PictureXxxModel->save();
		}
		

	}

	/**
	 * 获取模型名称。例：根据app\model\DestinationCityModel获取app\model\PictureDestinationCityModel
	 * @param  string $model [app\model\DestinationCityModel]
	 * @return string        [app\model\PictureDestinationCityModel]
	 */
	static public function getRelationModel($model)
	{
		return substr($model, 0, 10) . 'Picture' . substr($model, 10);
	}

	/**
	 * 获取图片
	 * @param  array $data xxxmodelId
	 * @return array       图片
	 * @author chuhang
	 */
	static public function getPictureModels($data) {
		//将数组转化为对应的格式，直接调用model层方法
		$temp = [];
		$temp['id'] = current($data);
		$temp['model'] = 'app/model/'. substr(key($data), 0, -3) . 'Model';
		$PictureModels = self::getRelationPicturesByXxxModelId($temp);
		
		return $PictureModels;
	}

	/**
	 * 通过modelid获取标题
	 * @param  array $data post信息
	 * @return string       对象的标题
	 * @author chuhang
	 */
	static public function getTitleById($data)
	{
		$XxxModelName = 'app\model\\' .substr(key($data), 0, -3) . 'Model';
		$XxxModel = $XxxModelName::get(current($data));
		
		return $XxxModel->getData('name');
	}
}
