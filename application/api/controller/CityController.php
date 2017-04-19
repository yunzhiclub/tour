<?php
namespace app\api\controller;
use think\Request;
use app\model\StartCityModel;	//出发城市

/*
 * 单条json数据
 * {
 *		"name": "天津",
 *      "id": 1,	
 *	}
 **/
class CityController extends ApiController {
	/**
	 * 获取全部的出发城市
	 * @return             array;
	 */
	public function getStartCity() {
		$StartCitys = StartCityModel::all();
		
		return $this->response($StartCitys);
	}

	public function test() {
        return $this->response($this->getPostJsonData());
    }
}
