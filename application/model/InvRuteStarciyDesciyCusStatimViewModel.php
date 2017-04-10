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

        // 拼接上传图片的前缀
        $pathconfig = 'http://127.0.0.1/tour'. DS .'public' . DS . 'upload' . DS;

		// 查询视图获取符合条件的邀约
		$InvRuteStarciyDesciyCusStatimViewModel = new InvRuteStarciyDesciyCusStatimViewModel;
		$invitations = $InvRuteStarciyDesciyCusStatimViewModel->where($type, 'in', $map)->select();

		// 判断获取到邀约
		if (empty($invitations)) {
			return $invitations;
		} else {

			// 遍历邀约为每个邀约添加床位信息
			foreach ($invitations as $invitation) {

			    // 如果没上传图片使用微信上的头像
			    if (empty($invitation->customer_head_img_url)) {

			    	// 微信上的图片不加前缀
                    $invitation->customer_head_img_url = $invitation->customer_head_img_url_wechat;
                } else {
                	// 为上传的图片加上前缀
                    $invitation->customer_head_img_url = $pathconfig.$invitation->customer_head_img_url;
                }

                // 为每个邀约添加床位信息
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

		// 定义邀约的总金额
		$totalMoney = 0;

		// 定义已经支付的总金额
		$payedMoney = 0;

		// 获得本次邀约的所有床位信息
		$BedModel = new BedModel();
		$bedInformations = $BedModel->where('invite_id', $id)->select();

		// 判断是否有床位信息
		 if (empty($bedInformations)) {
		 	$this->beds = [];
		 } else {
		 	// 遍历床位信息并添加客户信息
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
		 	// 为邀约添加床位信息
		 	$this->beds = $bedInformations;
		 }
		 // 为邀约添加总价和支付的价格信息
		 $this->totalMoney = $totalMoney;
		 $this->payedMoney = $payedMoney;
	}	
}
