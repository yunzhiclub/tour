<?php
namespace app\model;
use think\Model;
/**
 * 出发时间
 * @author huangshuaibin 
 */
class StartTimeModel extends Model
{
	/**
	 * 通过路线id取出  出发时间以及价格数据
	 * @param  int $RouteId 路线id
	 * @author huangshuaibin
	 * @return array          数组形式的出发事假以及价格数据
	 */
	public static function getStartTimeByRouteId($RouteId)
	{
		$StartTimeModel = new StartTimeModel;

		//通过路线查询
		$startTimes = $StartTimeModel->where('route_id', '=', $RouteId)->select();
		return $startTimes;
	}
}