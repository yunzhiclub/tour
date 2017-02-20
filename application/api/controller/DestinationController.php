<?php
namespace app\api\controller;
use think\Request;

class DestinationController extends ApiController {
	/**
	 * 获取全部的目的地(地区)
	 * @return             array;
	 */
	public function getDestinations() {

		// 示例数据
		$data = ["欧洲", '美洲', '意大利'];
		
		return $this->response($data);
	}

	/**
	 * 获取全部的目的地国家通过地区id
	 * @return             array;
	 */
	public function getCountrysByplaceid() {
	   	$placeid = Request::instance()->param('placeid');
	   	// 逻辑处理
		
		return $this->response([]);
	}

	/**
	 * 获取全部的城市通过国家id
	 * @return             array;
	 */
	public function getCitysBycountryid() {
	   	$countryid = Request::instance()->param('countryid');
	   	// 逻辑处理
		
		return $this->response([]);
	}
}
