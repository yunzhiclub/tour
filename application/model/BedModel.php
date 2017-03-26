<?php 
namespace app\model;

use app\model\CustomerModel;
/**
 * 床位
 */

class BedModel extends ModelModel
{
	/**
     * [床位模型关联客户模型]
     * @Author   梦云智www.mengyunzhi.com
     * @DateTime 2017-03-22T14:42:37+0800
     */
    public function Customer()
    {
        return $this->belongsTo('CustomerModel','customer_id');
    }

    /**
     * [床位模型关联邀约模型]
     * @Author   梦云智www.mengyunzhi.com
     * @DateTime 2017-03-22T15:52:18+0800
     */
    public function Invite()
    {
        return $this->belongsTo('InviteModel','invite_id');
    }

    /*
     *为该床位添加客户详细信息 获取的用户没有用is_delete判断
     *@return true or false
    */

    public function setCustomerInfor($customerId) {
        if (empty($customerId)) {
            return false;
        }

        // 如果有值就一定能取出数据来
        $customerId = CustomerModel::where('id', $customerId)->find();

        // 添加数据
        $birthday = $customerId->getData('birthday');
        if (!empty($birthday)) {
            $this->customer_birthday = $birthday;
        }

        $sex = $customerId->getData('sex');
          if (!empty($sex)) {
            $this->customer_sex = $sex;
        }
        $head_img_url = $customerId->getData('head_img_url');
          if (!empty($head_img_url)) {
            $this->customer_head_img_url = $head_img_url;
        }

        return true;
}
}
