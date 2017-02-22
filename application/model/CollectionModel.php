<?php
namespace app\model;
use think\Model;

class CollectionModel extends Model
{
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