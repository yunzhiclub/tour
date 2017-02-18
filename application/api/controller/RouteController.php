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
	 * 按目的地返回路线
	 * @param              int
	 * @return             array;
	 */
	public function getRoutesByplaceid() {
		$placeid = Request::instance()->param('placeid');

		return $this->response([]);
	}
}
