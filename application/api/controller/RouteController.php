<?php
namespace app\api\controller;
use think\Request;
use app\model\HomereCommendModel;
use app\model\InviteModel;
use app\model\RouteModel;	//路线
use app\model\StartTimeModel;	//出发时间
use app\model\EvaluateModel;	//评价
use app\model\CollectionModel;	//收藏
use app\model\FlightModel;

/*
 * 单条路线的json数据格式
 * { 
 *		"route":{
 *				"id": 1,
 *				"start_city_name": "天津",
 *				"destination_city_name": "伦敦",
 *     		 	"route_standard_price": 6777,
 *      		"route_starting_price": 8999,
 * 				"actualPrice": 5000,
 *				"begin_time": "2343243243", // 时间戳
 *				"hotel_title": "金门之星",
 *				"hotel_picture" "", // 目前数据库还没有该字段,
 *				"content":  "这是一个详细的路线描述",
 *				"description": "这是一个简述的路线描述",
 *				"service_phone":13389770089,
 *				"deadline": 23435435, // 时间戳
 *			  },
 *      "BeginFlight":{
 *							"up_time": "08:30",
 *							"down_time": "5:30",
 *							"company": "中国国际航空公司",
 *                    }
 *      "BackFlight":{
 *							"up_time": "08:30",
 *							"down_time": "5:30",
 *							"company": "中国国际航空公司",
 *                    }
 *  
 * }
 **/
class RouteController extends ApiController {
	/**
	 * 获取推荐路线
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getChosenRoutes() {
		//获取全部首页推荐的route_id 构成的数组
		$routeIds = HomereCommendModel::getAllHomeCommendIds();
		
		//通过首页推荐的路线ID数组  取出 对应所有邀约
		$invites = InviteModel::getInviteByRouteId($routeIds);
		
		return $this->response($invites);
	}

	/**
	 * 取出对应id的路线详情
	 * @param              int
	 * @return             object;
	 */
	public function getRouteById() {
		$id = Request::instance()->param('id');
		$map = [$id];
		//通过id取出路线
		$route = RouteModel::getRoutesDetails($map);
	
		return $this->response($route);
	}

	/**
	 * 取出对应id的路线所有出发时间和价格
	 * @param              int
	 * @return             array;
	 */
	public function getStarTimeById() {
		$id = Request::instance()->param('id');
		
		//通过路线id取出所有的出发时间以及价格
		$startTimes = StartTimeModel::getStartTimeByRouteId($id);

		return $this->response($startTimes);
	}

	/**
	 * method:get,
	 * params: countryid 目的城市id , cityid 出发城市id,
	 * return json [{上面的实例json}],
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-08 21:45
	 * 根据国家ID和出发城市ID获取全部路线
	 */
	public function getRoutesByCountryId() {
		$CountryId = Request::instance()->param('countryid');
		$StartCityId = Request::instance()->param('cityid');
		
		//获取符合条件的目的地国家城市和出发城市的路线id从视图中查询出来的，
		$routeIds = RouteModel::getRouteIdsByCountryIdAndStartCityId($StartCityId, $CountryId);

		//取出所有的符合查询条件的路线的详细信息，从DestinationCityRouteHotelFlightView视图中查询，返回的包含路线详情的对象数组
		$routes = RouteModel::getRoutesDetails($routeIds);
		
		return $this->response($routes);
	}

	/**
	 * 取出对应id的路线所有评价
	 * @param              int
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getEvaluatesById() {
		$id = Request::instance()->param('id');
		
		//通过路线id取出所有对应的评价
		$evaluates = EvaluateModel::getEvaluatesByRouteId($id);

		return $this->response($evaluates);
	}

	/**
	 * 收藏路线(路线id)
	 * @param              array
	 * @return             array(空数组);
	 */
	public function collectRoute()
	{
		$customerId  = Request::instance()->param('customerId');
		$routeId = Request::instance()->param('routeId');
		
		CollectionModel::saveCollection($customerId, $routeId);
		return $this->response([]);
	}

	// 获取感兴趣的路线 
	public function getInterestedRoutes() {
		$customerId  = Request::instance()->param('customerId');
		return $this->response([]);
	}
}
