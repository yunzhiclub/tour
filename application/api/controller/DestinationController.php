<?php
namespace app\api\controller;
use think\Request;
use app\model\RegionModel;	//地区
use app\model\CountryModel;	//国家
use app\model\DestinationCityModel;	//目的城市管理

class DestinationController extends ApiController {
	/**
	 * 获取全部的目的地(地区)
	 * @author huangshuaibin 
	 * @return             array;
	 */
	public function getAllRegions() {
		//取出所有目的地
		$regions = RegionModel::all();
		
		return $this->response($regions);
	}

	/**
	 * 获取全部的目的地国家   通过地区id
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getCountrysByRegionId() {
	   	$regionId = Request::instance()->param('id');

	   	$countrys = CountryModel::getCountrysByRegionId($regionId);
	   	
		return $this->response($countrys);
	}

	/**
	 * 获取全部的城市 通过国家id
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getCitysByCountryId() {
	   	$countryid = Request::instance()->param('id');

	   	// 通过国家id获取全部的城市的数据
		$DestinationCitys = DestinationCityModel::getDestinationCitysByCountryId($countryid);
		
		return $this->response($DestinationCitys);
	}
}
