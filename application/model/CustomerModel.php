<?php
namespace app\model;
use think\Request;
use app\model\JssdkModel;
/**
 * 前台的客户
 */
class CustomerModel extends ModelModel
{
    /**
     * 输出性别的属性
     * @return string 0男，1女
     * @author 梦云智 http://www.mengyunzhi.com
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
     * 通过opendId获取用户的基本信息
     * @param    string                   $openid 
     * @return   CustomerModel                           
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T17:17:10+0800
     */ 
    static public function getCustomerByOpenid($openid = '') {
        // 查找数据库是否存在
        $CustomerModel = CustomerModel::where('openid', '=', $openid)->find();
        
        //图片的路径拼接
        $pathconfig = 'http://127.0.0.1/tour'. DS .'public' . DS . 'upload' . DS;
        
        //对Customer中的部分数据进行简单的加工
        //图片URL的拼接
        if ('' !== $CustomerModel->head_img_url) {
            $CustomerModel->head_img_url = $pathconfig . $CustomerModel->head_img_url;
        } else {
            $CustomerModel->head_img_url = $CustomerModel->head_img_url_wechat;
        }
        if ('' !== $CustomerModel->card_img_front_url) {
            $CustomerModel->card_img_front_url = $pathconfig . $CustomerModel->card_img_front_url; 
        }
        if ('' !== $CustomerModel->card_img_back_url) {
            $CustomerModel->card_img_back_url = $pathconfig . $CustomerModel->card_img_back_url;
        }

        if (is_null($CustomerModel)) {
            $CustomerModel = new self();
        }
        
        // 数据库中存在，则返回获取到的对象
        return $CustomerModel;
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
    public static function saveCustomer($datas)
    {
        $data = $datas['data']; 
        //解码json数据
        $ObejectData = json_decode($data);
      
        //取出用户
        $OpenId = $ObejectData->openid;
        $Customer = CustomerModel::get($OpenId);
        
        //判断传过来的对象是否有对应属性并保存数据
        if (property_exists('ObejectData', 'nickName')) {
            $Customer->nick_name = $ObejectData->nickName;        
        }
        if (property_exists('ObejectData', 'sex')) {
            $Customer->sex = $ObejectData->sex;
        }

        if (property_exists('ObejectData', 'city')) {
            $Customer->city = $ObejectData->city;
        }
        if (property_exists('ObejectData', 'province')) {
            $Customer->province = $ObejectData->province;
        }
        if (property_exists('ObejectData', 'num')) {
            $Customer->phone = $ObejectData->num;
        }
        if (property_exists('ObejectData', 'country')) {
            $Customer->country = $ObejectData->country;
        }
        if (property_exists('ObejectData', 'email')) {
            $Customer->emial = $ObejectData->email;
        }
        if (property_exists('ObejectData', 'birthday')) {
            $Customer->date = $ObejectData->birthday;
        }
        if (property_exists('ObejectData', 'idcard')) {
            $Customer->idcard = $ObejectData->idcard;
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
            $Customer->head_img_url = $HeadImgUrl;
        }
        if (false !== $CardImgFrontUrl) {
            $Customer->card_img_front_url = $CardImgFrontUrl;
        }
        if (false !== $CardImgBackUrl) {
            $Customer->card_img_back_url = $CardImgBackUrl;
        }

        //调用保存图片的方法并将headUrl存入数据库
        
        if ($Customer->save()) {
            return false;
        }

        return true;
    }

}
