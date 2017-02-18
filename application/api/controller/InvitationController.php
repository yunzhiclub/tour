<?php
namespace app\api\controller;
use think\Request;

class InvitationController extends ApiController {
	/**
	 * 获取精选趣约
	 * @return             array;
	 */
	public function getChosedInvitations() {
		return $this->response([]);
	}

	/**
	 * 按目的地(地区id)返回趣约
	 * @param              int
	 * @return             array;
	 */
	public function getInvitationsByplaceid() {
		$placeid = Request::instance()->param('placeid');

		return $this->response([]);
	}

	/**
	 * 按目的地(国家id)返回趣约
	 * @param              int
	 * @return             array;
	 */
	public function getInvitationsBycountryid() {
		$placeid = Request::instance()->param('countryid');

		return $this->response([]);
	}
}
