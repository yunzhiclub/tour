<?php
namespace app\api\controller;
use think\Request;
use app\model\RouteModel;	//路线
use app\model\InviteModel;	//邀约
use app\model\ChosenModel;	//精选
use app\model\DestinationCityModel;	//目的地城市
use app\mode\StartTimeModel;	//出发时间
use app\model\StartCityModel;	//出发城市
use app\model\RegionModel;		//地区
use app\model\CountryModel;		//国家
use app\model\InviteRouteStartcityDestcityCustomerStarttimeViewModel; // 邀约视图
/**
 * 返回所有邀约的json单条实例数据
 * {
 *      "id": 1,
 *      "customer_id": 1,                       // "customer_"打头的是发布邀约的人的信息"
 *      "customer_nick_name": "成杰",
 *      "customer_birthday"：19970621,
 *      "customer_city": "天津",
 *      "customer_province": "天津",
 *      "customer_country": "中国",
 *      "customer_phone": "17602220356",
 *      "customer_email": "55185294@qq.com",
 *      "customer_head_img_url": "20170304\333b87ff9565d516fa4604542106c6a9e4a6db99.png",
 *      "customer_sex": 1,
 *      "destination_city_id":1,
 *      "destination_city_name": "巴黎",
 *      "invite_deadline": 132432423423,            // 时间戳形式 取出的不能过期
 *      "invite_is_public": 1,                      // 必须是1 公开的
 *      "invite_number": 1232423422,                // 订单号
 *      "route_actual_price":6000,                  // 路线的实际价格
 *      "route_begin_time": 2342342432,             // 路线默认的开始时间
 *      "route_content": "这个是一个路线的内容的详细描述",
 *      "route_description": "这是一个路线比较简短的描述信息",
 *      "route_id" : 1,
 *      "route_name": "美国三日游",
 *      "start_city_id": 2,
 *      "start_city_name": "天津",
 *      "start_time_date": 4587878787,
 *      "start_time_id": 1,                     // 有值就代表不使用路线默认的时间出发时间
 *      "start_time_money": 60000,
 *      "totalMoney": start_time_money或者 route_actual_price * 6 // 得到的六人总价格
 *      "payedMoney": 5000,                         // 已经支付的钱 已经占床位的钱的和
 *      // 6个床位信息
 *      "beds": [
 *                {
 *                       "id": 2,
 *                      "invite_id": 3,
 *                      "customer_id": null or 2,
 *                      // 如果有客户就有下面的字段
 *                      "customer_head_img_url": 		"20170304\333b87ff9565d516fa4604542106c6a9e4a6db99.png",
 *                      "customer_sex" : 1,
 *                      "customer_birthday": 19941109,
 *                      // 下面的都有
 *                      "money": 1000,
 *                      "old": 1,  // 1,2,3表示不同年龄段
 *                      "sex": 1,
 *                  },
 *              ],
 * }
 * */
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
		$Invitations = InviteRouteStartcityDestcityCustomerStarttimeViewModel::getInviteByMap($type, $map);
		return $this->response($Invitations);
	}

	/**
	 * 1.首先根据地区获取地区所包含的国家
	 * 2.根据国家获取所包含的目的地城市
	 * 3.根据目的地城市查询InviteRouteStartcityDestcityCustomerStarttimeViewModel视图，获取该地区所包含的邀约	
	 * @return array
	 * @author chuhang
	 */
	public function getInvitationsByRegionId()
	{
		$id = Request::instance()->param('id');
		//获取地区中包含的目的地城市id
		$map = RegionModel::getDestinationCityIdsByRegionId($id);

		//从邀约视图中查询
		$type = 'destination_city_id';
		$Invitations = InviteRouteStartcityDestcityCustomerStarttimeViewModel::getInviteByMap($type, $map);

		return $this->response($Invitations);

	}

	/**
	 * 1.获取国家包含的目的地城市id
	 * 2.从邀约视图中获取对应目的地城市id的邀约
	 * @return array 
	 * @author chuhang 
	 */
	public function getInvitationsByCountryId()
	{
		$id = Request::instance()->param('id');
		//获取地区中包含的目的地城市id
		$map = CountryModel::getDestinationCityIdsByConuntryId($id);

		//从邀约视图中查询
		$type = 'destination_city_id';
		$Invitations = InviteRouteStartcityDestcityCustomerStarttimeViewModel::getInviteByMap($type, $map);

		return $this->response($Invitations);
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
		die();
		return $this->response(['1']);
	}

	/**
	 * 去支付
	 * @param
	 * @return             array[]
	 */
	public function toPay() {
		$customerId = Request::instance()->param('customerId');
		$invitationId = Request::instance()->param('invitationId');
        $bedId = Request::instance()->param('bedId');

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

	/**
     * 获取全部的趣约
	 * */
	public function getAllInvitations() {
		$Invitations = InviteRouteStartcityDestcityCustomerStarttimeViewModel::all();
		return $this->response($Invitations);
    }

    /**
     * 通过目的地城市id获取邀约
     * @return array 
     * @author chuhang 
     */
    public function getInvitationsByDestinationCityId()
    {
    	$id = Request::instance()->param('id');

    	$map[] = $id;

    	//从邀约视图中查询
    	$type = 'destination_city_id';
    	$Invitations = InviteRouteStartcityDestcityCustomerStarttimeViewModel::getInviteByMap($type, $map);

    	return $this->response($Invitations);
    }

    /**
     * 通过出发城市id获取邀约
     * @return array 
     * @author chuhang 
     */
    public function getInvitationsByStartCityId()
    {
    	$id = Request::instance()->param('id');
    	$map[] = $id;

    	//从邀约视图中查询
    	$type = 'start_city_id';
    	$Invitations = InviteRouteStartcityDestcityCustomerStarttimeViewModel::getInviteByMap($type, $map);

    	return $this->response($Invitations);
    }
}
