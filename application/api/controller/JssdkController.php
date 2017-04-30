<?php
namespace app\api\controller;
use app\model\JssdkModel;
use think\Config;
use think\Request;
use think\File;
use app\model\PayModel;
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
	 * 获取支付参数
	 * */
    public function getPayParams() {
        // 微信支付分配的公众账号ID　实例值wxd678efh567hg6787
	    $openid = Request::instance()->param('openid');
	    // 商品简单描述 实例
        $body = '腾讯充值中心-QQ会员充值';
        // 商户订单号 实例
        $out_trade_no = '20150806125346';　
        // 订单总金额，单位为分 (交易金额默认为人民币交易，接口中参数支付金额单位为【分】，参数值不能带小数。对账单中的交易金额单位为【元】。
        //外币交易的支付金额精确到币种的最小单位，参数值不能带小数点。)
        $total_fee = 67899;
        //异步接收微信支付结果通知的回调地址，通知url必须为外网可访问的url，不能携带参数。
        $notify_url = 'http://www.weixin.qq.com/wxpay/pay.php';
        $PayModel = new PayModel();
        $params = $PayModel->createPayParams($openid, $body, $out_trade_no, $total_fee, $notify_url);
        if ($params === fasle) {
            return $this->response(10001);
        } else {
            return $this->response($params);
        }
    }

}