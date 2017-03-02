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

	/**
	 * 通过用户ID获取用户的全部收藏
	 * @param  int $UserId 用户的id
	 * @return array         用户的所有收藏
	 */
	public static function getCollectionsByUserId($UserId)
	{
		$Collection = new CollectionModel;
		$collections = $Collection->where('user_id', 'in', $UserId)->select();
		return $collections;
	}	
}