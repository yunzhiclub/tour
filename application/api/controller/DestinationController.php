<?php
namespace app\api\controller;
use think\Request;

class DestinationController extends ApiController {
	/**
	 * 获取全部的目的地
	 * @return             array;
	 */
	public function getDestinations() {

		// 示例数据
		$data = ["欧洲", '美洲', '意大利', '美国'];
		
		return $this->response($data);
	}
}
