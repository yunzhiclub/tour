<?php
namespace app\model;
use think\Model;
/**
 * 精选
 */
class ChosenModel extends Model
{
	/**
	 * 获取精选的邀约的id并压入数组$map,用于取出invite信息的查询条件
	 * @author huangshuaibin
	 */
	public static function ChosenInvite()
	{
		$temp = ChosenModel::all();
		$map = [];

		//遍历Chosen表中的route_id  合并成数组
		foreach ($temp as $key => $value) {
			array_push($map, $value->route_id);
		}
		return $map;
	}
}