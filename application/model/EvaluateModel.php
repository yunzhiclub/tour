<?php
namespace app\model;

/**
 * 评价
 */
class EvaluateModel extends ModelModel
{
	/**
	 **通过路线id查询对应的评价		
	 * @param  int $RouteId 路线id
	 * @author huangshuaibin 
	 * @return array          返回评价信息 组成的一个数组
	 */
	public static function getEvaluatesByRouteId($RouteId)
	{
		$EvaluateModel = new EvaluateModel;

		//通过路线id查询对应的评价
		$evaluates = $EvaluateModel->where('route_id', '=', $RouteId)->select();
		return $evaluates;
	}
}
