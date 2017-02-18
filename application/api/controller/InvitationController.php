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
	 * 按目的地返回趣约
	 * @param              int
	 * @return             array;
	 */
	public function getInvitationsByplaceid() {
		$placeid = Request::instance()->param('placeid');

		return $this->response([]);
	}
}
