<?php
namespace app\model;

/**
 * 图片路线模型
 */
class PictureRouteModel extends ModelModel
{
	/**
	 * 获取路线图片信息
	 * @param  int $id 路线id
	 * @return array     图片信息
	 */
	static public function getPictureRouteModels($id)
	{
		$map['route_id'] = $id;
		$map['is_delete'] = 0;
		$PictureRouteModel = new self;
		$PictureRouteModels = $PictureRouteModel->where($map)->select();

		foreach ($PictureRouteModels as $PictureRouteModel) {
			$pictureId = $PictureRouteModel->getData('picture_id');
			$results[] = PictureModel::get($pictureId);
		}
		
		if (!isset($results)) {
			return null;
		}
		return $results;

	}
}