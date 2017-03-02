<?php
namespace app\api\controller;
use think\Request;
use app\model\UserModel;
use app\model\CollectionModel;
use app\model\OrderModel;
use app\model\InviteModel;  //邀约

class UserController extends ApiController 
{
    private $UserModel;

    public function __construct(Request $request = null) {
        parent::__construct($request);

        // 获取用户传入的openid
        $openid = Request::instance()->param('openid');

        // 验证openid长度是否符合
        // if (!UserModel::checkOpenidLength($openid)) {
        //     $this->response(20002);     // openid长度不正确
        //     return;
        // }

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
       var_dump($datas);
       die();
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
    public function getCollectionsByUserId()
    {
        $userId = Request::instance()->param('user_id');
       // 获取该客户的收藏
       $Collections =  CollectionModel::getCollectionsByUserId($userId);
       
       return $this->response($Collections);  
    }

    /**
     * 获取用户的全部订单
     * @param    int                  $user_id [description]
     * @return   
     * 成功 return $this->response($orders);| 错误 $this->   
     * response(20004, $UserModel->getError());
     */
    public function getOrdersByuserId() 
    {
        $userId = Request::instance()->param('user_id');
       // 获取用户的全部订单
       $orders = OrderModel::getOrdersByuserId($userId);

       return $this->response($orders);   
    }

    /**
     * 按趣约id和用户id设置是否公开....趣约公开应该是不需要用户的id
     * @param              int
     * @return     保存成功会返回1 保存不成功返回错误信息或者错误码
     */
    public function setInviteIsPublic() {
        $id = Request::instance()->param('id');
        //$userId = Request::instance()->param('user_id');
        //flag=1是将把订单改为公开,flag=0,将订单改成不公开
        $flag = Request::instance()->param('flag');

        //调用改变订单状态是否公开的函数
        $status = InviteModel::SetInviteIsPublic(1,1);
        if (false === $status) {
            return "设置失败";
        }

        return $this->response(1);
    }

    /**
     * 根据订单状态和用户id获取订单列表(包括自己发布的)
     * @param              int
     * @return             array[];
     */
    public function getInvitationsByUserIdAndStatus() {
        //暂定status=1是邀约成型,status=0是邀约正在征集中
        $status = Request::instance()->param('status');
        $userId = Request::instance()->param('user_id');
        $invitation = InviteModel::getInviteByUserIdAndStatus($status, $userId);

        return $this->response($invitation);
    }

    /**
     * 按趣约id和用户id评价订单
     * @param              int
     * @return             array[];
     */
    public function toEvaluate() {
        
        $InviteId = Request::instance()->param('invite_id');
        $UserId   = Request::instance()->param('user_id');

        
        return $this->response([]);
    }
}
