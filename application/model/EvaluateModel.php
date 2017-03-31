<?php
namespace app\model;

/**
 * 评价
 */
class EvaluateModel extends ModelModel
{
	private $RouteModel = null;      //对应路线模型

	private $CustomerModel = null;   //对应的客户模型


	/**
	 * 当前模型和路线模型的比为n:1
	 * @author chuhang 
	 */
	public function RouteModel() 
	{
		if (null === $this->RouteModel) {
			$this->RouteModel = RouteModel::get($this->getData('route_id'));
		}

		return $this->RouteModel;

	}

	/**
	 * 当前模型和客户模型比为m:n
	 * @author chuhang 
	 */
	public function CustomerModel()
	{
		if (null === $this->CustomerModel) {
			$this->CustomerModel = CustomerModel::get($this->getData('customer_id'));
		}

		return $this->CustomerModel;
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
