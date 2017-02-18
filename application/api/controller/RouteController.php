<?php
namespace app\api\controller;
use think\Request;

class RouteController extends ApiController {
	/**
	 * 获取推荐路线
	 * @return             array;
	 */
	public function getChosedRoutes() {
		return $this->response([]);
	}

	/**
	 * 取出对应id的路线详情
	 * @param              int
	 * @return             object;
	 */
	public function getRouteByid() {
		$id = Request::instance()->param('id');

		return $this->response([]);
	}

	/**
	 * 取出对应id的路线所有出发时间和价格
	 * @param              int
	 * @return             array;
	 */
	public function getStartimeByid() {
		$id = Request::instance()->param('id');

		return $this->response([]);
	}

	/**
	 * 取出对应目的地(国家id)和出发城市id的所有路线
	 * @param              int
	 * @return             object;
	 */
	public function getRoutesBycountryid() {
		$countryid = Request::instance()->param('countryid');
		$cityid = Request::instance()->param('cityid');

		return $this->response([]);
	}

	/**
	 * 取出对应id的路线所有评价
	 * @param              int
	 * @return             array;
	 */
	public function getEvaluatesByid() {
		$id = Request::instance()->param('id');

		return $this->response([]);
	}

	/**
	 * 收藏路线(路线id)
	 * @param              array
	 * @return             array(空数组);
	 */
	public function collecteTheRoute() {
		$user_id  = Request::instance()->param('user_id');
		$route_id = Request::instance()->param('route_id');
		
		return $this->response([]);
	}
}
