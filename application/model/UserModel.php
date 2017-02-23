<?php
namespace app\model;
use think\Model;
/**
 * 客户
 * @author huangshuaibin 
 */
class UserModel extends Model
{
	/**
     * 通过opendId获取用户的基本信息
     * @param    string                   $openid 
     * @return   UserModel                           
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T17:17:10+0800
     */
    static public function getUserModelByOpenid($openid = '') {
        // 查找数据库是否存在
        $UserModel = UserModel::get($openid);
    
        if (is_null($UserModel)) {
            $UserModel = new self();
        }

        // 数据库中存在，则返回获取到的对象
        return $UserModel;
    }

    /**
     * 验证openid位数是否正确
     * @return   boolean true:正确 | false:错误
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T17:01:07+0800
     */
    static public function checkOpenidLength($openid = '') {
        // 较验openid的长度
        if (strlen($openid) === 28) {
            return true;   
        } else {
            return false;
        }
        
    }
}