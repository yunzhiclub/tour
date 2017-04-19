<?php
namespace app\model;

/**
 * 支付订单管理
 * @author huangshuaibin
*/
class OrderModel extends ModelModel
{
	/**
	 * 通过用户id获取该用户的所有的订单	
	 * @param  int $userId 用户的id
	 * @return array         用户的订单的数组
	 */
	public static function getOrdersByUserId($userId)
	{
		$Order = new OrderModel;
		$orders = $Order->where('user_id', '=', $userId)->select();
		return $orders;
	}

	public function Bed()
	{
		return $this->hasOne('BedModel');
	}

	public function getInviteModelByOrderId($order_id)
	{
		$InviteModel = new InviteModel;
		$map['order_id'] = $order_id;
	}
}
