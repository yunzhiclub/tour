<?php 
namespace app\model;

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
}

