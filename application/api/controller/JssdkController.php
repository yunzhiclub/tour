<?php
namespace app\api\controller;
use app\model\JssdkModel;
use think\Config;
use think\Request;
use think\File;
use app\model\PayModel;
use Wechat\WechatPay;
use app\model\OrderModel;
use app\model\InviteModel;
use app\model\BedModel;

/**
* jsssdk处理类
*/
class JssdkController extends ApiController
{
	
	// 获取jssdk的配置
	public function getConfig() {

		$url = Request::instance()->param('url');
		
		$jssdkModel = new JssdkModel();
		$signPackage = $jssdkModel->getConfig($url);

		return $this->response($signPackage);
	}
	/*
	 * 获取支付参数 isCreateInvite 1 表示发起邀约　0 表示应邀　2　表示去支付那些取消支付的订单
	 * */
    public function getPayParams() {
        $stringInvitation = Request::instance()->param('data');
	    $isCreateInvite = Request::instance()->param('isCreateInvite');
        // 订单总金额，单位为分 (交易金额默认为人民币交易，接口中参数支付金额单位为【分】，参数值不能带小数。对账单中的交易金额单位为【元】。
        //外币交易的支付金额精确到币种的最小单位，参数值不能带小数点。)
        $total_fee = 67899;

        // 商户订单号 实例
        $out_trade_no = '20150806125346';
        $openid = 'oUpF8uMuAJO_M2pxb1Q9zNjWeS6o';
	    // 如果$isCreateInvite为１则表明这是发起邀约的支付
	    if ($isCreateInvite === '1') {
            // 保存邀约并获取openid money number
            $result = InviteModel::saveInvitation($stringInvitation);
            $openid = $result['openid'];
            // 变成分为单位
            $total_fee = $result['money'] * 100;
            $out_trade_no = $result['number'];
        } else if($isCreateInvite === '0'){
	        // 应邀
            $dataObject = json_decode($stringInvitation);
            $openid = $dataObject->openid;
            $bedId = $dataObject->bedId;
            $customerId = $dataObject->customerId;
            // 床位设置customer_id 并生成订单
            $data = BedModel::setCustomerIdAndCreateOrder($bedId, $customerId);
            $total_fee = $data['money'] * 100;
            $out_trade_no = $data['number'];
        } else {
            // 重新去支付
            $dataObject = json_decode($stringInvitation);
            $openid = $dataObject->openid;
            $total_fee = $dataObject->money * 100;
            $out_trade_no = $dataObject->number;
        }
	    // 商品简单描述 实例
        $body = '腾讯充值中心-QQ会员充值';


        //异步接收微信支付结果通知的回调地址，通知url必须为外网可访问的url，不能携带参数。
        //example 'http://www.weixin.qq.com/wxpay/pay.php'
        $notify_url = 'http://' . $_SERVER['HTTP_HOST'] . DS . 'tour'. DS .'public' . DS . 'api' . DS . 'Jssdk' . DS . 'getNotify?' ;
        $PayModel = new PayModel();
        $params = $PayModel->createPayParams($openid, $body, $out_trade_no, $total_fee, $notify_url);
        $params['out_trade_no'] = $out_trade_no;
        if ($params === fasle) {
            return $this->response(10001);
        } else {
            return $this->response($params);
        }

    }
    /*
     * 异步接收微信支付结果通知的回调地址
     * @return xml
     * */
    public function getNotify() {
        // 定义要回复的xml的值
        $data = [];
        // 调用wechat组件去验证请求的数据
        $WechatPay = new WechatPay();
        $notifyInfo = $WechatPay->getNotify();
        if ($notifyInfo === false) {
            $data['return_code'] = 'Fall';
            $data['return_msg'] = $WechatPay->errMsg;
        }
        // 去处理数据
        if ($notifyInfo['result_code'] === 'SUCCESS') {
            // 获取订单号
            $number = $notifyInfo['out_trade_no'];
            // 修改订单目前的状态
            $Order = new OrderModel();
            $OrderDetail = $Order->where('number', '=', $number)->find();
            $status = $OrderDetail->getData('status');
            if ($status === 0) {
                $OrderDetail->status = 1;
                $OrderDetail->save();
                // 去判断是否订单所有的人都支付完成，如果是就改变所有ｏｒｄｅｒ的状态为２
                $inviteId = $OrderDetail->getData('invite_id');
                $InviteModel = new InviteModel();
                $InviteModel->isAllPayed($inviteId);
            }
            $data['return_code'] = 'SUCCESS';
        }
        // 回复ｘｍｌ信息
        return $WechatPay->replyXml($data, true);
    }

    /*
     * 调用查询ａｐｉ，查询支付结果
     * @param number 订单号
     * @return json
     * */
    public function queryOrder() {
        $out_trade_no = Request::instance()->param('number');
        // 判断是否接到通知
        $Order = new OrderModel();
        $OrderDetail = $Order->where('number', '=', $out_trade_no)->find();
        $status = $OrderDetail->getData('status');
        // 状态等于０证明还没有收到正确的回复，　就去查询订单的状态
        if ($status === 0) {
            $WechatPay = new WechatPay();
            $result = $WechatPay->queryOrder($out_trade_no);
            // 判断是否正确返回查询结果
            if ($result === false) {
                return $this->response(10001);
            } else {
                // 判断该订单是否完成支付，如果完成就去改变订单的状态
                if ($result['trade_state'] === 'SUCCESS') {
                    $OrderDetail->status = 1;
                    $OrderDetail->save();
                    // 去判断是否订单所有的人都支付完成，如果是就改变所有ｏｒｄｅｒ的状态为２
                    $inviteId = $OrderDetail->getData('invite_id');
                    $InviteModel = new InviteModel();
                    $InviteModel->isAllPayed($inviteId);
                }
            }
        }
        // 获取该实际支付成功与否的订单并返回
        $map = array(
            'number' => $out_trade_no,
        );

        $OrderDetail = OrderModel::getOrderDetailByMap($map);
        return $this->response($OrderDetail);
    }
}