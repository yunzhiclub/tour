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

	/**
	 * @param $value
	 * @return mixed
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-10 21:59
	 * 输出性别
	 */
    public function getSexAttr($value)
	{
		$status = array('0'=>'男','1'=>'女');
		$sex = $status[$value];
		if (isset($sex))
		{
			return $sex;
		} else {
			return $status[0];
		}
	}

	/**
	 * @param $customerId
	 * @return bool
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-10 22:01
	 * 为该床位添加客户详细信息 (获取的用户没有用is_delete判断)
	 * 判断该床位是否有用户，无则直接返回false
	 * 有用户返回用户的头像和性别年龄信息
	 */
    public function setCustomerInfor($customerId) {
        // 如果这个床位上没有用户直接返回false
        if (empty($customerId)) {
            return false;
        }

        //头像的路径拼接
        $pathConfig = 'http://127.0.0.1/tour'. DS .'public' . DS . 'upload' . DS;

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
        $head_img_url_wechat = $customerId->getData('head_img_url_wechat');
          if (!empty($head_img_url)) {
            $this->customer_head_img_url = $pathConfig.$head_img_url;
        }else {
                if(!empty($head_img_url_wechat)) {
                    $this->customer_head_img_url = $head_img_url_wechat;
                }

          }

        return true;
}
}
