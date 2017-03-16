<?php
namespace app\model;

/**
 * 首页推荐
 * @author huangshuaibin
 */

class HomeRecommendModel extends ModelModel
{
	private $RouteModel = null;

	/**
	 * 获取RouteModel通过本对象中的route_id
	 * @author huangshuaibin 
	 * @return Object Route对象
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
	 * 取出所有的首页推荐对应的路线ID
	 * @return [type] [description]
	 */
	public static function getAllHomeCommendIds()
	{
		//取出所有的首页推荐
		$HomeRecommends = HomeRecommendModel::all();

		$temp=[];
		//将推荐的ID 打包成一个临时数组
		foreach ($HomeRecommends as $key => $value) {
			array_push($temp, $value->route_id);
		}

		return $temp;
	}
}
