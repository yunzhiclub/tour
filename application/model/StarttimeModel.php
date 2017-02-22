<?php
namespace app\model;
use think\Model;
/**
 * 出发时间
 * @author huangshuaibin 
 */
class StarttimeModel extends Model
{
	/**
	 * 通过路线id取出  出发时间以及价格数据
	 * @param  int $RouteId 路线id
	 * @author huangshuaibin
	 * @return array          数组形式的出发事假以及价格数据
	 */
	public static function getStarttimeByRouteId($RouteId)
	{
		$StarttimeModel = new StarttimeModel;

		//通过路线查询
		$starttimes = $StarttimeModel->where('route_id', '=', $RouteId)->select();
		return $starttimes;
	}
}