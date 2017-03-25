<?php
namespace app\model;

use app\model\BedModel;

/*
前台邀约的视图
*/
class InvRuteStarciyDesciyCusStatimViewModel extends ModelModel
{
	/**
	 * 通过查route_id对应的询条件$map获取邀约
	 * @param  array $map 查询条件数组
	 * @return array      邀约数组
	 */
	public static function getInviteByMap($type, $map) {

		// 为查询条件添加is_delete信息
		// $map->start_city_is_delete = 0;
		// $map->destination_city_is_delete = 0;
		// $map->customer_is_delete = 0;
		// $map->route_is_delete = 0;
		$InvRuteStarciyDesciyCusStatimViewModel = new InvRuteStarciyDesciyCusStatimViewModel;
		$invitations = $InvRuteStarciyDesciyCusStatimViewModel->where($type, 'in', $map)->select();
		 // 添加床位信息
		if (empty($invitations)) {
			return $invitations;
		} else {
			foreach ($invitations as $invitation) {
				$invitation->setBedInformations();
			}
		}
		return $invitations;
	}

	/*
	* 给每个邀约加上床位信息
	*/
	public function setBedInformations() {
		// 获得本对象邀约的id
		$id = $this->getData('id');
		$totalMoney = 0;
		$payedMoney = 0;
		// 获得本次邀约的所有床位信息
		$BedModel = new BedModel();
		$bedInformations = $BedModel->where('invite_id', $id)->select();

		// 判断是否有床位信息
		 if (empty($bedInformations)) {
		 	$this->beds = [];
		 } else {
		 	// 为所有的床位信息添加客户信息
		 	foreach ($bedInformations as  $bedInformation) {
		 		$customerId = $bedInformation->getData('customer_id');
		 		$bedInformation->setCustomerInfor($customerId);
		 	}
		 	// 为邀约添加总金额
		 	foreach ($bedInformations as $bedInformation) {
		 		$totalMoney += $bedInformation->money;
		 	}	 	
		 	// 为邀约添加已支付的总金额
		 	foreach ($bedInformations as $bedInformation) {
		 		// 如果床位已经有人了证明已经支付
		 		if ($bedInformation->customer_id !== null) {
		 			$payedMoney += $bedInformation->money;
		 		}
		 	}		 	
		 	// 为邀约视图添加床位信息
		 	$this->beds = $bedInformations;
		 }
		 $this->totalMoney = $totalMoney;
		 $this->payedMoney = $payedMoney;
	}	
}
