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

	/**
	 * 获取首页显示的目的城市(4个)
	 * @return array
	 */
	public function getHomeCitys() {
		// example data
		$data = ['日本', '韩国', '意大利', '美国'];
			
	 
		return $this->response($data);
	}

	/**
	 * 获取首页显示的目的地区(3个)
	 * @return array
	 */
	public function getHomeRegions() {
		// example data
		$data = ['欧洲', '美洲', '澳洲'];
			
	 
		return $this->response($data);
	}

	// 获取用户感兴趣的目的地
	public function getInterstedDestinations() {

		$countryid = Request::instance()->param('customerId');
		
		return $this->response([]);	
	}

	// 获取全部目的地城市
	public function getDestinationCountrys(){
		 $data = ['美国', '韩国', '日本'];
		 return $this->response($data);	
	}
}
