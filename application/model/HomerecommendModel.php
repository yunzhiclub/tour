<?php
namespace app\model;
use think\Model;
/**
 * 首页推荐
 * @author huangshuaibin
 */

class HomerecommendModel extends Model
{
	/**
	 * 取出所有的首页推荐对应的路线ID
	 * @return [type] [description]
	 */
	public static function getAllHomecommendIds()
	{
		//取出所有的首页推荐
		$homerecommends = HomerecommendModel::all();

		$temp=[];
		//将推荐的ID 打包成一个临时数组
		foreach ($homerecommends as $key => $value) {
			array_push($temp, $value->route_id);
		}

		return $temp;
	}
}