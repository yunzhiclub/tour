<?php
namespace app\api\controller;
use think\Request;
use app\model\RegionModel;	//地区
use app\model\CountryModel;	//国家
use app\model\DestinationcityModel;	//目的城市管理

class DestinationController extends ApiController {
	/**
	 * 获取全部的目的地(地区)
	 * @author huangshuaibin 
	 * @return             array;
	 */
	public function getDestinations() {
		//取出所有目的地
		$regions = RegionModel::all();
		
		return $this->response($regions);
	}

	/**
	 * 获取全部的目的地国家   通过地区id
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getCountrysByplaceid() {
	   	$regionId = Request::instance()->param('id');

	   	//查询条件
	   	$map = array('region_id' => $regionId);

	   	//根据地区id查询
	   	$Country = new CountryModel;
		$countrys = $Country->where($map)->select();

		return $this->response($countrys);
	}

	/**
	 * 获取全部的城市 通过国家id
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getCitysBycountryid() {
	   	//$countryid = Request::instance()->param('id');
		$countryid = 2;
	   	// 逻辑处理
		$map = array('country_id' => $countryid);

		$Destinationcity = new DestinationcityModel;
		$destinationcitys = $Destinationcity->where($map)->select();
		
		return $this->response($destinationcitys);
	}
}
