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

	/**
	 * 根据用户的筛选条件查询信息
	 * @param  array $data [用户的查询条件]
	 * @return [object]       [首页推荐信息]
	 * @author zhangmengxiang
	 */
	public function getSearchInfo($data) {
        $map['is_delete'] = 0;

		if (isset($data['expiration_time']) && $data['expiration_time'] !== '0') {
			$map['expiration_time'] = $data['expiration_time'];
		}
		if (isset($data['weight']) && $data['weight'] !== '0') {
			$map['weight'] = $data['weight'];
		}
		
		
		$this->where($map);
		
		unset($map);
		return $this;
	}
	/**
	 * 获取首页推荐的路线、首页推荐基本信息	
	 * @return [array] 
	 * @author zhangmengxiang
	 */

	static public function getBasicInfo()
	{
		$map = [];
		$map['is_delete'] = 0;
		
		//获取路线信息
		$RouteModel = new RouteModel;
		$result['RouteModels'] = $RouteModel->where($map)->select();
		//获取首页推荐信息
		$HomeRecommendModel = new HomeRecommendModel;
		$result['HomeRecommendModels'] = $HomeRecommendModel->where($map)->select();

		unset($HomeRecommendModel);
		unset($RouteModel);

		return $result;
	}
}
