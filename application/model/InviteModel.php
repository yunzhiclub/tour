<?php
namespace app\model;
use think\Model;
/**
 * 邀约
 */
class InviteModel extends Model
{
	/**
	 * 通过查route_id对应的询条件$map获取邀约
	 * @param  array $map 查询条件数组
	 * @return array      邀约数组
	 */
	public static function getInviteByRouteId($map)
	{
		$InviteModel = new InviteModel;
		$invitions = $InviteModel->where('route_id','in',$map)->select();
		return $invitions;
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
	 * @param  int $userId 用户id
	 * @author huangshuaibin
	 * @return array         满足条件的邀约订单
	 */
	public static function getInviteByUserIdAndStatus($status, $userId)
	{
		$InviteModel = new InviteModel;
		$invites = $InviteModel->where('user_id', '=', $userId)->select();

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
}
