<?php
namespace app\api\controller;
use think\Request;
use app\model\StartCityModel;	//出发城市

class CityController extends ApiController {
	/**
	 * 获取全部的出发城市
	 * @return             array;
	 */
	public function getStartCitys() {
		$StartCitys = StartCityModel::all();
		
		return $this->response($StartCitys);
	}

	public function test() {
        return $this->response($this->getPostJsonData());
    }
}
