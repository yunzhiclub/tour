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
	public static function getOrdersByCustomerId($CustomerId)
	{
		$Order = new OrderModel;
		$orders = $Order->where('customer_id', '=', $CustomerId)->select();
		return $orders;
	}
}
