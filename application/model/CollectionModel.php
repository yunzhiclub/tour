<?php
namespace app\model;


class CollectionModel extends ModelModel
{
	private $RouteModel = null;

	/**
	 * 取出route_id对应的RouteModel
	 * @author huangshuaibin 
	 * @return object RouteModel
	 */
	public function getRouteModel()
	{
		if (null === $this->RouteModel) {
			$RouteId = $this->getData('route_id');
			$this->RouteModel = RouteModel::get($RouteId);
		}

		return $this->RouteModel;
	}
	/**
	 * 保存收藏
	 * @param  int $customerId  用户id
	 * @param  int $routeId 路线id
	 * @author huangshuaibin
	 * @return bool          true or false
	 */
	public static function saveCollection($customerId,$routeId)
	{
		$Collection = new CollectionModel;
		$Collection->customer_id = $customerId;
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
	public static function getCollectionsByCustomerId($CustomerId)
	{
		$Collection = new CollectionModel;
		//  根据客户id获取收藏
		$map['customer_id'] = $CustomerId;
		$collections = $Collection->where($map)->select();

		//  返回数组
		$result = [];


		foreach ($collections as $key =>  $collection){
			//  根据routeId获取routeModel
			$routeId = $collection->route_id;
			$Route = RouteModel::get($routeId);
			//  获取路线名称和描述信息
			$result[$key]['id'] = $collection->id;
			$result[$key]['name'] = $Route->getData('name');
			$result[$key]['description'] = $Route->description;
		}
		return $result;
	}
	/**
	 *   获得对应路线信息
	 * @return object
	 * @author zhangmengxiang
	 */
	public function getRoute()
	{
		$routeId = $this->getData('route_id');
		$Route = RouteModel::get($routeId);
		return $Route;
	}		
}
