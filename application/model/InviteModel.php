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
}