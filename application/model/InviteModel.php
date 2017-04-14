<?php
namespace app\model;

/**
 * 邀约
 */
class InviteModel extends ModelModel
{
	private $RouteModel = null;
	private $CustomerModel = null;
	private $StartTimeModel = null;
	private $BedModel = null;

	/**
	 * 输出是否公开的状态状态
	 * @param  string $value 0 输出‘否’ 1 输出‘是’
	 * @author huangshuaibin 
	 * @return bool        true or false
	 */
	public function getIsPublicAttr($value)
	{
		$status = array(
						'0' => '否',
						'1' => '是'
						);
		$IsShow = $status[$value];

		//如果没有$IsShow变量存在，默认输出  ‘是’,否则根据状态输出对应的状态
		if (isset($IsPay)) {
			return $IsShow;
		} else {
			return $status[0];
		}
	}

	public function getStatusAttr($value)
	{
		$status = array(
						'0' => '进行',
						'1' => '完结',
						);
		$InviteStatus = $status[$value];

		if (isset($InviteStatus)) {
			return $InviteStatus;
		} else {
			return $status[0];
		}
	}
	/**
	 * 通过该Model的外键获取Route对应的对象
	 * @return Objct 获取的RouteModel对象
	 */
	public function getRouteModel()
	{
		if (null === $this->RouteModel) {
			$RouteId = $this->getData('route_id');
			$this->RouteModel = RouteModel::get($RouteId);
		}

		return $this->RouteModel;
	}

	/**
	 * 获取用户model通过该对象的外键customer_id
	 * @return object 前台客户对象
	 */
	public function getCustomerModel()
	{
		if (null === $this->CustomerModel) {
			$CustomerId = $this->getData('customer_id');
			$this->CustomerModel = CustomerModel::get($CustomerId);
		}

		return $this->CustomerModel;
	}

	/**
	 * 通过该对象中的start_time_id获取StartTimeModel
	 * @return object StartTimeModel
	 */
	public function getStartTimeModel()
	{
		if (null == $this->StartTimeModel) {
			$StartTimeId = $this->getData('start_time_id');
			$this->StartTimeModel = StartTimeModel::get($StartTimeId);
		}

		return $this->StartTimeModel;
	}
	
	/**
	 * 通过查route_id对应的询条件$map获取邀约
	 * @param  array $map 查询条件数组
	 * @return array      邀约数组
	 */
	public static function getInviteByRouteId($map)
	{
		$InviteModel = new InviteModel;
		$invitations = $InviteModel->where('route_id','in',$map)->select();
		return $invitations;
	}

	/**
	 * 改变邀约是否公开的状态	
	 * @param  int $id   邀约的id
	 * @param  int $flag 0 or 1
	 * @author huangshuaibin
	 * @return boolean       true or false
	 */
	public static function SetInviteIsPublic($id, $flag)
	{
		$invite = InviteModel::get($id);
		//flag = 1将ispublic改成
		if ($flag == 1) {
			$invite->ispublic = 1;
		}

		if ($flag == 0) {
			$invite->ispublic = 0;
		}

		if (false == $invite->save()) {
			return false;
		}

		return true;
	}
	/**
	 * 通过订单状态以及用户的ID获取获取自己订单的列表
	 * $status=1的时候表名要取出的邀约订单已经成型
	 * $status=0                            未成型
	 * @param  int $status 0 or 1
	 * @param  int $CustomerId 用户id
	 * @author huangshuaibin
	 * @return array         满足条件的邀约订单
	 */
	public static function getInviteByCustomerIdAndStatus($status, $CustomerId)
	{
		$InviteModel = new InviteModel;
		$invites = $InviteModel->where('customer_id', '=', $CustomerId)->select();

		//建立临时数组,作为取出邀约的查询条件
		$temp = [];

		//取出状态是公开的邀约
		if (1 == $status) {
			foreach ($invites as $key => $value) {
				if (1 == $value->status) {
					array_push($temp, $value->id);
				}
			}
		}

		//取出状态是不公开的订单
		if (0 == $status) {
			foreach ($invites as $key => $value) {
				if (1 == $value->status) {
					array_push($temp, $value->id);
				}
			}
		}

		$invitations = $InviteModel->where('id', 'in', $temp)->select();
		return $invitations;
	}

	/**
	 * 保存邀约，保存对应的床位信息
	 * @param  string $stringInvitation 前台传来的邀约的字符串，以及六个用户的床位信息
	 * @author huangshuaibin
	 * @return true or false                   true表示保存成功
	 */
	public static function saveInvitation($stringInvitation)
	{
		$Invitation = json_decode($stringInvitation);
		$InviteModel = new InviteModel;

		//邀约的相关信息放入InviteModel的对象中
		$InviteModel->customer_id = $Invitation->customerId;
		$InviteModel->start_time_id = $Invitation->startTimeId;
		$InviteModel->route_id = $Invitation->routeId;
		$InviteModel->is_public = $Invitation->isPublic;
		$InviteModel->deadline = $Invitation->deadLine;

		//保存邀约
		$InviteModel->save();

		//去除邀约的id,用于后边的保存
		$inviteId = $InviteModel->id;
		
		//遍历保存六个床位
		for ($i=0; $i < 6; $i++) { 
			$BedModel = new BedModel;

			$BedModel->invite_id = $inviteId;
			$BedModel->sex = $Invitation->roomDatas[$i]->sex;

			//TODO只是把前台的数据存入了数据库，并没有根据对年龄的范围进行判断，前后台对于年龄的标识一致后，进行进一步改写
			$BedModel->old = $Invitation->roomDatas[$i]->old;
			$BedModel->money = $Invitation->roomDatas[$i]->money;
			$BedModel->type = $Invitation->roomDatas[$i]->type;

			//如果前台的床位isPay字段是1的情况，表示该床位是当前用户的床位
			if (1 === $Invitation->roomDatas[$i]->isPay) {
				//TODO调用微信支付接口
				//完成支付之后，将该用户保存进bed表
				$OrderModel = new OrderModel;
				$OrderModel->customer_id = $Invitation->customerId;
				$OrderModel->invite_id = $inviteId;
				$OrderModel->number = self::getOrderNumber($Invitation->customerId);
				$OrderModel->save();
				
				//保存customer_id进相应的床位表
				$BedModel->customer_id = $Invitation->customerId;
			}

			$BedModel->save();
		}

		return true;
	}

	/**
	 * 获取订单编号，订单编号格式如下:
	 * 日期+时间戳后五位+（100000 - 客户id）
	 * eg:201609303243499094
	 * @param  int $customerId 客户id
	 * @return string             订单编号
	 * @author chuhang 
	 */
	static public function getOrderNumber($customerId)
	{
		$date = date("Ymd");
        $timestamp = substr(time(), -5, 5);
        $customerId = sprintf("%05d", 100000 - $customerId);

        return $date . $timestamp . $customerId;
	}
}
