<?php
namespace app\api\controller;
use think\Request;
use app\model\Start;	//出发城市

class CityController extends ApiController {
	/**
	 * 获取全部的出发城市
	 * @return             array;
	 */
	public function getStartCitys() {
		$starts = Start::all();
		return $this->response($starts);
	}
}
