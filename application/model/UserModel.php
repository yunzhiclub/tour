<?php
namespace app\model;
use think\Model;
use app\model\JssdkModel;
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
        
        //保存图片的路径
        $pathconfig = ROOT_PATH . 'public' . DS . 'upload' . DS;
        
        //对User中的部分数据进行简单的加工
        //图片URL的拼接
        if ('' !== $UserModel->head_img_url) {
            $UserModel->head_img_url = $pathconfig . $UserModel->head_img_url;
        }
        if ('' !== $UserModel->card_img_front_url) {
            $UserModel->card_img_front_url = $pathconfig . $UserModel->card_img_front_url; 
        }
        if ('' !== $UserModel->card_img_back_url) {
            $UserModel->card_img_back_url = $pathconfig . $UserModel->card_img_back_url;
        }

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
            $User->nick_name = $ObejectData->nickName;        
        }
        if (property_exists('ObejectData', 'sex')) {
            $User->sex = $ObejectData->sex;
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

        //从前台传来的对象中取出HeadImg的对象
        //从HeadImg中取出serverId(头像)
        $HeadImg = $ObejectData->headImg;
        $HeadImgServerId = $HeadImg->serverId;

        //身份证正面保存
        $CardImgFrontUrl = $ObejectData->frontIdCardImg;
        $CardfrontImgServerId = $CardImgFrontUrl->serverId;

        //身份证反面保存
        $BackIdCardImg = $ObejectData->backIdCardImg;
        $BackIdCardImgServerId = $BackIdCardImg->serverId;

        //保存头像图片到public/upload文件夹下边
        $JssdkModel = new JssdkModel;
        $HeadImgUrl = $JssdkModel->download($HeadImgServerId);
        $CardImgFrontUrl = $JssdkModel->download($CardfrontImgServerId);
        $CardImgBackUrl = $JssdkModel->download($BackIdCardImgServerId);

        if (false !== $HeadImgUrl) {
            $User->head_img_url = $HeadImgUrl;
        }
        if (false !== $CardImgFrontUrl) {
            $User->card_img_front_url = $CardImgFrontUrl;
        }
        if (false !== $CardImgBackUrl) {
            $User->card_img_back_url = $CardImgBackUrl;
        }

        //调用保存图片的方法并将headUrl存入数据库
        
        if ($User->save()) {
            return false;
        }

        return true;
    }
}