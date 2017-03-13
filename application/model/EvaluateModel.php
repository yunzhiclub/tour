<?php
namespace app\model;

/**
 * 评价
 */
class EvaluateModel extends ModelModel
{
	private $CustomerModel = null;
	private $RouteModel = null;

	/**
	 * 获取用户Model
	 * @return Object 用户对象
	 */
	public function getCustomerModel()
	{
		if (null === $this->CustomerModel) {
			$CustomerId = $this->getData('customer_id');
			$this->CustomerModel = CustomerModel::get($CustomerId);
		}

		return $this->CustomerModel;
	}

	/**
	 * 获取路线对象
	 * @return Object 外键对应的Route对象
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
