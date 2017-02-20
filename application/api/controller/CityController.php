<?php
namespace app\api\controller;
use think\Request;

class CityController extends ApiController {
	/**
	 * 获取全部的出发城市
	 * @return             array;
	 */
	public function getStartCitys() {
		
		return $this->response([]);
	}
}
