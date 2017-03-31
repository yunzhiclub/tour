<?php
namespace app\model;

/**
 * 出发时间
 * @author huangshuaibin 
 */
class StartTimeModel extends ModelModel
{
	private $RouteModel = null;		//外键关联的对象
	/**
	 * 获取属性中route_id对应的对象
	 * @author huangshuaibin 
	 * @return Objext 对应的Route对象
	 */
	public function getRouteModel()
	{
		//判断该对象是否使用过该对象,如果没有使用该对象
		if (null == $this->RouteModel) {
			$RouteId = $this->getData('route_id');
			$this->RouteModel = RouteModel::get($RouteId);
		}
		
		return $this->RouteModel;
	}
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
		$startTimes = $StartTimeModel->where('route_id', '=', $RouteId)->order('date desc')->select();

		return $startTimes;
	}
}
