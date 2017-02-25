<?php
namespace app\model;
use think\Model;
/**
 * 前台的客户
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

    /**
     * 保存前台用户信息
     * @param  json $datas 前台传来的json格式的数据
     * @author huangshuaibin
     * @return bool        true or false
     */
    public static function saveUser($datas)
    {
        $data = $datas['data']; 
        //解码json数据
        $ObejectData = json_decode($data);

        //取出用户
        $OpenId = $ObejectData->openid;
        $User = UserModel::get($OpenId);

        //判断传过来的对象是否有对应属性并保存数据
        if (property_exists('ObejectData', 'nickName')) {
            $User->nickName = $ObejectData->nickName;        
        }
        if (property_exists('ObejectData', 'sex')) {
            $User->sex = $ObejectData->sex;
        }
        if (property_exists('ObejectData', 'headimgurl')) {
            $User->headimgurl = $ObejectData->headimgurl;
        }

        if (property_exists('ObejectData', 'city')) {
            $User->city = $ObejectData->city;
        }
        if (property_exists('ObejectData', 'province')) {
            $User->province = $ObejectData->province;
        }
        if (property_exists('ObejectData', 'num')) {
            $User->phone = $ObejectData->num;
        }
        if (property_exists('ObejectData', 'country')) {
            $User->country = $ObejectData->country;
        }
        if (property_exists('ObejectData', 'email')) {
            $User->emial = $ObejectData->email;
        }
        if (property_exists('ObejectData', 'birthday')) {
            $User->date = $ObejectData->birthday;
        }
        if (property_exists('ObejectData', 'idcard')) {
            $User->idcard = $ObejectData->idcard;
        }
        if (property_exists('ObejectData', 'cardimgfonturl')) {
            $User->cardimgfonturl = $ObejectData->cardimgfonturl;
        }
        if (property_exists('ObejectData', 'cardimgversourl')) {
            $User->cardimgversourl = $ObejectData->cardimgversourl;
        }
        if ($User->save()) {
            return false;
        }

        return true;
    }
}