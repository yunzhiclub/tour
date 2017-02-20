<?php
namespace app\api\controller;
use think\Request;
use app\model\Region;	//地区
use app\model\Country;	//国家

class DestinationController extends ApiController {
	/**
	 * 获取全部的目的地(地区)
	 * @return             array;
	 */
	public function getDestinations() {
		//取出所有目的地
		$regions = Region::all();
		
		return $this->response($regions);
	}

	/**
	 * 获取全部的目的地国家   通过地区id
	 * @return             array;
	 */
	public function getCountrysByplaceid() {
	   	$regionId = Request::instance()->param('id');
	   	// 逻辑处理
	   	
	   	$map = array('region_id' => $regionId);

	   	//根据地区id查询
	   	$Country = new Country;
		$countrys = $Country->where($map)->select();

		return $this->response($countrys);
	}

	/**
	 * 获取全部的城市 通过国家id
	 * @return             array;
	 */
	public function getCitysBycountryid() {
	   	$countryid = Request::instance()->param('id');
	   	// 逻辑处理
		$map = array('country_id' => $countryid);
		return $this->response([]);
	}
}
