<?php
namespace app\api\controller;
use think\Request;
use app\model\RouteModel;	//路线
use app\model\InviteModel;	//邀约
use app\model\ChosenModel;	//精选
use app\model\DestinationCityModel;	//目的地城市
use app\mode\StartTimeModel;	//出发时间
use app\model\StartCityModel;	//出发城市
use app\model\InvRuteStarciyDesciyCusStatimViewModel; // 邀约视图

class InvitationController extends ApiController {
	/**
	 * 获取精选趣约
	 * @author huangshauibin
	 * @return             array;
	 */
	public function getChosenInvites() {
		//获取查询信息,精选
		$map = ChosenModel::ChosenInvite();
		
		//从邀约表中查询
		$type = 'route_id';
		$Invitations = InvRuteStarciyDesciyCusStatimViewModel::getInviteByMap($type, $map);
		return $this->response($Invitations);
	}

	/**
	 * 按目的地(地区id)返回趣约
	 * @param              int
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getInvitationsByRegionId() {
		$id = Request::instance()->param('id');

		//获取路线ID By目的地ID
		$map = RouteModel::getRouteIdByDestinationId($id);
		
		//通过路线id查询邀约
		$invitions = InviteModel::getInviteByRouteId($map);
		
		return $this->response($invitions);
	}

	/**
	 * 按目的地(国家id)返回趣约
	 * @param              int
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getInvitationsByCountryId() {
		$id = Request::instance()->param('id');
		var_dump($id);
		die();
		//获取国家对应目的城市ID
		$destinationcityIds = DestinationcityModel::getDestinationIdByCountryId($id);

		//根据目的城市ID取出对应路线ID
		$routeIds = RouteModel::getRouteIdByDestinationId($destinationcityIds);

		//根据路线ID取出对应趣约ID
		$invites = InviteModel::getInviteByRouteId($routeIds);

		return $this->response($invites);
	}

	/**
	 * 保存趣约
	 * @param              string
	 * @return             int(新生成的趣约的id);
	 */
	public function saveInvitation() {
		
		$stringInvitation = Request::instance()->param('data');

		if (false === InviteModel::saveInvitation($stringInvitation)) {
			return '保存失败';
		}
		
		return $this->response(['1']);
	}

	/**
	 * 去支付
	 * @param              string
	 * @return             array[]
	 */
	public function topay() {
		$user_id = Request::instance()->param('user_id');
		$invite_id = Request::instance()->param('invite_id');

		return $this->response([]);
	}

	/**
	 * 按时间获取趣约???按照什么时间,时间ID还是时间....
	 * @param              string
	 * @return             array[]
	 */
	public function getInvitationsByStartTime() {
		//$time = Request::instance()->param('time');
		
		//通过日期获取路线id数组

		//通过路线id数组取出对应邀约数组
		return $this->response([]);
	}

	/**
	 * 按出发城市id返回趣约
	 * @param              int
	 * @author huangshuaibin
	 * @return             array;
	 */
	public function getInvitationsByStartCityId() {
		$StartCityId = Request::instance()->param('cityId');
		
		//根据出发城市id(一个id)取出对应路线ID数组
		$routeIds = RouteModel::getRouteIdByStartId($StartCityId);

		//根据路线ID数组 取出对应邀约
		$invites = InviteModel::getInviteByRouteId($routeIds);
		
		return $this->response($invites);
	}

	/**
	 * 按趣约id返回趣约详情
	 * @param              int
	 * @return             array;
	 */
	public function getInvitationById() {
		$id = Request::instance()->param('id');

		return $this->response([]);
	}

	/*
	* 通过出发时间id获取对应路线的金额
	*/
	public function getPriceByStartTimeId() {
		
		$startTimeId = Request::instance()->param('startTimeId');

		return $this->response(['price' => 5688]);
	}
}
