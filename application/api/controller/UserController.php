<?php
namespace app\api\controller;
use think\Request;
use app\model\UserModel;

class UserController extends ApiController {
    private $UserModel;

    public function __construct(Request $request = null) {
        parent::__construct($request);

        // 获取用户传入的openid
        $openid = Request::instance()->param('openid');

        // 验证openid长度是否符合
        if (!UserModel::checkOpenidLength($openid)) {
            $this->response(20002);     // openid长度不正确
            return;
        }

        // 获取用户实体
        $UserModel = UserModel::getUserModelByOpenid($openid);
    }


    /**
     * 获取用户基本信息
     * @return   [type]                   [description]
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-22T10:13:54+0800
     */
    public function getUserByOpenid($openid) {
        try {
            // 获取用户实体
            $UserModel = UserModel::getUserModelByOpenid($openid);
            
            // 成功设置，返回空数组
            return $this->response($UserModel);

        } catch (\Exception $e) {
            $this->exception($e);
        }
    }

    /**
     * 保存用户信息
     * @param    object                  $user [description]
     * @return   
     * 成功 return $this->response([]);| 错误 $this->   
     * response(20004, $UserModel->getError());
     */
    public function saveUser() {
       // datas是一个数组,data是其中的Json字符串
       $datas = Request::instance()->param();

       //调用保存用户方法
       if(UserModel::saveUser($datas) === false) {
            return '保存失败';
       }

       return '保存成功';
    }

    /**
     * 获取收藏
     * @param    int                  $user_id [description]
     * @return   
     * 成功 return $this->response($Collections);| 错误 $this->   
     * response(20004, $UserModel->getError());
     */
    public function getCollectionsByuserid() {
        $user_id = Request::instance()->param('user_id');
       // 保存客户的逻辑     
    }

    /**
     * 获取用户的全部订单
     * @param    int                  $user_id [description]
     * @return   
     * 成功 return $this->response($orders);| 错误 $this->   
     * response(20004, $UserModel->getError());
     */
    public function getOrdersByuserid() {
        $user_id = Request::instance()->param('user_id');
       // 逻辑     
    }

    /**
     * 按趣约id和用户id设置是否公开
     * @param              int
     * @return             array[];
     */
    public function setIsOpen() {
        $id = Request::instance()->param('id');
        $user_id = Request::instance()->param('user_id');

        return $this->response([]);
    }

    /**
     * 根据订单状态和用户id获取订单列表(包括自己发布的)
     * @param              int
     * @return             array[];
     */
    public function getInvitationsBystatus() {
        $status = Request::instance()->param('status');
        $user_id = Request::instance()->param('user_id');

        return $this->response([]);
    }

    /**
     * 按趣约id和用户id评价订单
     * @param              int
     * @return             array[];
     */
    public function toEvaluate() {
        

        return $this->response([]);
    }
}
