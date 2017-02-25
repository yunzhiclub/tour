<?php
namespace app\api\controller;
use think\Request;
use app\model\HomerecommendModel;
use app\model\InviteModel;
use app\model\RouteModel;	//路线
use app\model\StarttimeModel;	//出发时间
use app\model\EvaluateModel;	//评价
use app\model\CollectionModel;	//收藏

class RouteController extends ApiController {
	/**
	 * 获取推荐路线
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getChosedRoutes() {
		//获取全部首页推荐的route_id 构成的数组
		$routeIds = HomerecommendModel::getAllHomecommendIds();
		
		//通过首页推荐的路线ID数组  取出 对应所有邀约
		$invites = InviteModel::getInviteByRouteId($routeIds);
		
		return $this->response($invites);
	}

	/**
	 * 取出对应id的路线详情
	 * @param              int
	 * @return             object;
	 */
	public function getRouteByid() {
		$id = Request::instance()->param('id');
		//通过id取出路线
		$route = RouteModel::getRouteById($id);
		
		return $this->response($route);
	}

	/**
	 * 取出对应id的路线所有出发时间和价格
	 * @param              int
	 * @return             array;
	 */
	public function getStartimeByid() {
		$id = Request::instance()->param('id');

		//通过路线id取出所有的出发时间以及价格
		$startimes = StarttimeModel::getStarttimeByRouteId($id);

		return $this->response($startimes);
	}

	/**
	 * 取出对应目的地(国家id)和出发城市id的所有路线
	 * @param              int
	 * @return             object;
	 */
	public function getRoutesByCountryId() {
		$countryid = Request::instance()->param('countryid');
		$cityid = Request::instance()->param('cityid');
		
		//获取符合条件的目的地国家城市和出发城市的路线id
		$routeIds = RouteModel::getRouteIdsByCountryIdAndStart($cityid, $countryid);

		//通过路线id取出所有的路线详情
		$routes = RouteModel::getRoutesByIds($routeIds);
		
		return $this->response([]);
	}

	/**
	 * 取出对应id的路线所有评价
	 * @param              int
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getEvaluatesByid() {
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
	public function collecteTheRoute() 
	{
		$user_id  = Request::instance()->param('user_id');
		$route_id = Request::instance()->param('route_id');
		
		CollectionModel::saveCollection($user_id,$route_id);
		return $this->response([]);
	}
}
