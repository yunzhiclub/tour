<?php
namespace app\api\controller;
use think\Request;
use app\model\RegionModel;	//地区
use app\model\CountryModel;	//国家
use app\model\DestinationCityModel;	//目的城市管理
use app\model\HomeCityModel;	//首页城市
use app\model\HomeRegionModel;	//首页地区

class DestinationController extends ApiController {
	
	/**
	 * 获取全部的目的地(地区)
	 * method: get
	 * return json数据
	 * {
	 *      "id": 1,
	 *		"pictureUrl":     , // 目前数据库中没有该字段
	 *      "name": "美洲",
	 * }
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
	 * method: get
	 * param: id
	 * return json {
	 * 		"id": 1,
	 *      "name": "美国",
	 *      "pictureUrl":     , //数据库中暂时没有该字段 
	 * }
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

	/**
	 * 获取首页显示的目的城市(4个)
	 * @return array
	 */
	public function getHomeCitys() {
		$HomeCityNames = HomeCityModel::getFourHomeCityNames();

		return $this->response($HomeCityNames);
	}

	/**
	 * 获取首页显示的目的地区(3个)
	 * @return array
	 */
	public function getHomeRegions() {
		$HomeRegionNames = HomeRegionModel::getThreeHomeRegionNames();

		return $this->response($HomeRegionNames);
	}

	// 获取用户感兴趣的目的地
	public function getInterstedDestinations() {

		$countryid = Request::instance()->param('customerId');
		
		return $this->response([]);	
	}

	// 获取全部目的地城市
	public function getDestinationCountrys(){
		 $DestinationCountrys = DestinationCityModel::all();
		 return $this->response($DestinationCountrys);
	}
}
