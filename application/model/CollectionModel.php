<?php
namespace app\model;
use think\Model;

class CollectionModel extends Model
{
	/**
	 * 保存收藏
	 * @param  int $userId  用户id
	 * @param  int $routeId 路线id
	 * @author huangshuaibin
	 * @return bool          true or false
	 */
	public static function saveCollection($userId,$routeId)
	{
		$Collection = new CollectionModel;
		$Collection->user_id = $userId;
		$Collection->route_id = $routeId;
		
		if (false === $Collection->save()) {
			return false;
		}

		return true;
	}
}