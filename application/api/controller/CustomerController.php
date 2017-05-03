<?php
namespace app\api\controller;
use think\Request;
use app\model\CustomerModel;
use app\model\CollectionModel;
use app\model\OrderModel;
use app\model\InviteModel;  //邀约

class CustomerController extends ApiController 
{
    private $Customer;

    public function __construct(Request $request = null) {
        parent::__construct($request);

        // 获取用户传入的openid
        $openid = Request::instance()->param('openid');

        // 验证openid长度是否符合
        // if (!Customer::checkOpenidLength($openid)) {
        //     $this->response(20002);     // openid长度不正确
        //     return;
        // }

        // 获取用户实体
        $Customer = CustomerModel::getCustomerByOpenid($openid);
    }


    /**
     * 获取用户基本信息
     * @return   [type]                   [description]
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-22T10:13:54+0800
     */
    public function getCustomerByOpenid($openid) {
        try {
            // 获取用户实体
            $Customer = CustomerModel::getCustomerByOpenid($openid);
            
            // 成功设置，返回空数组
            return $this->response($Customer);

        } catch (\Exception $e) {
            $this->exception($e);
        }
    }

    /**
     * 保存用户信息
     * @param    object                  $Customer [description]
     * @return   
     * 成功 return $this->response([]);| 错误 $this->   
     * response(20004, $Customer->getError());
     */
    public function saveCustomer() {
       // datas是一个数组,data是其中的Json字符串
       $datas = Request::instance()->param();
       
       //调用保存用户方法
       if(CustomerModel::saveCustomer($datas) === false) {
            return '保存失败';
       }

       return '保存成功';
    }

    /**
     * 获取收藏
     * @param    int                  $Customer_id [description]
     * @return   
     * 成功 return $this->response($Collections);| 错误 $this->   
     * response(20004, $Customer->getError());
     */
    /*
    json[
    {
    	'id': '1',
        'name': '欧洲七日游',
        'description': '这是第二个测试',
    }
    ]
    */
    public function getCollectionsByCustomerId()
    {
        $CustomerId = Request::instance()->param('customer_id');

       // 获取该客户的收藏
       $Collections =  CollectionModel::getCollectionsByCustomerId($CustomerId);
       return $this->response($Collections);
    }

    /**
     * 按趣约id和用户id设置是否公开....趣约公开应该是不需要用户的id
     * @param              int
     * @return     保存成功会返回1 保存不成功返回错误信息或者错误码
     */
    public function setInviteIsPublic() {
        $id = Request::instance()->param('id');
        //$CustomerId = Request::instance()->param('Customer_id');
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
    public function getInvitationsByCustomerIdAndStatus() {
        //暂定status=1是邀约成型,status=0是邀约正在征集中
        $status = Request::instance()->param('status');
        $CustomerId = Request::instance()->param('customer_id');
        $invitation = InviteModel::getInviteByCustomerIdAndStatus($status, $CustomerId);

        return $this->response($invitation);
    }

    /**
     * 按趣约id和用户id评价订单
     * @param              int
     * @return             array[];
     */
    public function toEvaluate() {
        
        $InviteId = Request::instance()->param('invite_id');
        $CustomerId   = Request::instance()->param('customer_id');

        
        return $this->response([]);
    }

	/**
	 * 获取用户的全部订单
	 * @param    int                  $Customer_id [description]
	 * @return
	 * 成功 return $this->response($orders);| 错误 $this->
	 * response(20004, $Customer->getError());
	 */
	public function getAllOrderByCustomerId()
	{
		$CustomerId = Request::instance()->param('customer_id');
		// 获取用户的全部订单
		$orders = OrderModel::getAllOrderByCustomerId($CustomerId);

		return $this->response($orders);
	}

	/**
	 * @return json
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-22 15:02
	 * 获取未支付订单
	 */
	public function getUnPayOrderByCustomerId()
	{
		$CustomerId = Request::instance()->param('customer_id');
		// 获取用户的全部订单
		$orders = OrderModel::getUnPayOrderByCustomerId($CustomerId);

		return $this->response($orders);
	}

	/**
	 * @return json
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-22 15:04
	 *        获取未成团订单
	 */
	public function getUnSetOutOrderByCustomerId()
	{
		$CustomerId = Request::instance()->param('customer_id');
		// 获取用户的全部订单
		$orders = OrderModel::getUnSetOutOrderByCustomerId($CustomerId);

		return $this->response($orders);
	}

	/**
	 * @return json
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time:2017-04-22 15:04
	 *        获取未评价订单
	 */
	public function getUnEvaluateOrderByCustomerId()
	{
		$CustomerId = Request::instance()->param('customer_id');
		// 获取用户的全部订单
		$orders = OrderModel::getUnEvaluateOrderByCustomerId($CustomerId);

		return $this->response($orders);
	}
	/*
	 * 设置订单是否公开
	 * */
	public function setIsPublic() {
        $ispublic = Request::instance()->param('ispublic');
        $orderNumber = Request::instance()->param('orderNumber');
        // 设置订单
        $OrderModel = new OrderModel();
        $OrderModel->setIsPublic($ispublic, $orderNumber);
        $this->response([]);
    }

}
