<?php
namespace app\model;
use think\Model;
/**
 * 首页推荐
 * @author huangshuaibin
 */

class HomeRecommendModel extends Model
{
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