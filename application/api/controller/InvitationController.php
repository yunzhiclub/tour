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

	/**
	 * 保存趣约
	 * @param              string
	 * @return             int(新生成的趣约的id);
	 */
	public function saveTheInvitation() {
		

		return $this->response([]);
	}

	/**
	 * 保存趣约
	 * @param              string
	 * @return             array[]
	 */
	public function topay() {
		$user_id = Request::instance()->param('user_id');
		$invite_id = Request::instance()->param('invite_id');

		return $this->response([]);
	}

	/**
	 * 按时间获取趣约
	 * @param              string
	 * @return             array[]
	 */
	public function getInvitationsBytime() {
		$time = Request::instance()->param('time');
		

		return $this->response([]);
	}

	/**
	 * 按出发城市id返回趣约
	 * @param              int
	 * @return             array;
	 */
	public function getInvitationsBycityid() {
		$cityid = Request::instance()->param('cityid');

		return $this->response([]);
	}

	/**
	 * 按趣约id返回趣约详情
	 * @param              int
	 * @return             array;
	 */
	public function getInvitationByid() {
		$id = Request::instance()->param('id');

		return $this->response([]);
	}

	
}
