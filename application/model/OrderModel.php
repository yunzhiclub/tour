<?php
namespace app\model;

/**
 * 支付订单管理
 * @author huangshuaibin
*/
class OrderModel extends ModelModel
{
	/**
	 * @return \think\model\relation\HasOne
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-22 17:14
	 *  关联bed表
	 */
	public function Bed()
	{
		return $this->hasOne('BedModel');
	}
	/**
	 * 通过用户id获取该用户的所有的订单	
	 * @param  int $userId 用户的id
	 * @return array         用户的订单的数组
	 */
	public static function getAllOrderByCustomerId($CustomerId)
	{
		//  根据客户id获取客户的所有订单
		$map['customer_id'] = $CustomerId;
		$result = OrderModel::getOrderDetailByMap($map);
		//  返回数组
		return $result;
	}

	/**
	 * @param $CustomerId
	 * @return mixed
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-22 17:19
	 *        获取所有未支付订单
	 */
	public static function getUnPayOrderByCustomerId($CustomerId)
	{
		//  根据客户id获取客户的所有未支付订单
		$map['customer_id'] = $CustomerId;
		$map['status'] = 0;
		$result = OrderModel::getOrderDetailByMap($map);
		//  返回数组
		return $result;
	}

	/**
	 * @param $CustomerId
	 * @return mixed
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-22 17:20
	 *        获取所有未成团订单
	 */
	public static function getUnSetOutOrderByCustomerId($CustomerId)
	{
		//  根据客户id获取客户的所有未成团订单
		$map['customer_id'] = $CustomerId;
		$map['status'] = 1;
		$result = OrderModel::getOrderDetailByMap($map);
		//  返回数组
		return $result;
	}

	/**
	 * @param $CustomerId
	 * @return mixed
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-22 17:21
	 *        获取所有未评价订单
	 */
	public static function getUnEvaluateOrderByCustomerId($CustomerId)
	{
		//  根据客户id获取客户的所有未成团订单
		$map['customer_id'] = $CustomerId;
		$map['status'] = 2;
		$result = OrderModel::getOrderDetailByMap($map);
		//  返回数组
		return $result;
	}

	/**
	 * @param $map
	 * @return mixed
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-22 17:15
	 *        根据不同的查询条件拼接订单详情
	 */
	public static function getOrderDetailByMap($map)
	{
		$result = [];
		//  根据查询条件查出订单
		$Order = new OrderModel;
		$orders = $Order->where($map)->select();
		//  获取订单中的详细信息
		foreach ($orders as $key => $order){
			//  订单中的订单编号、状态、是否公开、金额
			$result[$key]['id'] = $order->getData('id');
			$result[$key]['number'] = $order->getData('number');
			$result[$key]['status'] = $order->getData('status');
			$result[$key]['is_public'] = $order->getData('is_public');
			$result[$key]['money'] = $order->getData('money');
			//  获取邀约表中的预定时间、出发时间、返程时间、出游人数
			$inviteId = $order->getData('invite_id');
			$Invite = InviteModel::get($inviteId);
			$result[$key]['create_time'] = $Invite->getData('create_time');
			$result[$key]['set_out_time'] = $Invite->getData('set_out_time');
			$result[$key]['back_time'] = $Invite->getData('back_time');
			$result[$key]['person_num'] = $Invite->getData('person_num');
			//  获取路线表中的路线名称、详情
			$routeId = $Invite->getData('route_id');
			$Route = RouteModel::get($routeId);
			$result[$key]['name'] = $Route->getData('name');
			$result[$key]['description'] = $Route->getData('description');
			//	获取出发城市的名称
			$startCityId = $Route->getData('start_city_id');
			$StartCity = StartCityModel::get($startCityId);
			$result[$key]['start_city'] = $StartCity->getData('name');
		}
		return $result;
	}

	public static function getOrderDetailById($id)
	{
//		设置返回数组
		$result = [];
//		根据传入的id获取ordermodel
		$order = OrderModel::get($id);
		$map['invite_id'] = $order->invite_id;
//		根据邀约id获取所有床位信息
		$Bed = new BedModel;
		$beds = $Bed->where($map)->select();

		foreach ($beds as $key => $bed){
//			返回床位中的价格和性别
			$result[$key]['money'] = $bed->money;
			$result[$key]['sex'] = $bed->sex;
//			根据客户id获取客户信息返回客户姓名和头像
			$customer_id = $bed->customer_id;
			$customer = CustomerModel::get($customer_id);
			$result[$key]['head_img_url'] = $customer->head_img_url;
			$result[$key]['name'] = $customer->getData('nick_name');
//			根据床位订单1:1关系获取订单中状态
			$order_id = $bed->order_id;
			$Order = OrderModel::get($order_id);
			$result[$key]['status'] = $Order->getData('status');
		}

		return $result;
	}
}
