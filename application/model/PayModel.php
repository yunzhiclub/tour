<?php
/**
 * Created by PhpStorm.
 * User: zhenjie
 * Date: 17-4-27
 * Time: 下午9:50
 */
class PayModel {
    // 配置文件中的wechat的信息
    protected $config;

    public function __construct() {
        $this->config = Config::get('wechat');
    }
    // 获取Media类的配置文件
    public function getOptions() {
        $config = $this->config;
        $config['token'] =  '';
        $config['appid'] = $config['app_id'];
        $config['appsecret'] = $config['secret'];
        $config['encodingaeskey'] = '';
        $config['mch_id'] = '';
        $config['partnerkey'] = '';
        $config['ssl_cer'] = '';
        $config['ssl_key'] = '';
        $config['cachepath'] = '';
        return $config;
    }

    /*
     * 获取预支付id
     * @param string $openid 用户openid，　JSAPI必填
     * @param string $body 商品标题
     * @param string $out_trade_no 第三方订单号
     * @param int $total_free 订单总价
     * @param string $notify_url 支付成功回调地址
     * @param string $trade_type 支付类型JSAPI|NATIVE|APP
     * @param string $goods_tag 商品标记，代金卷或立减优惠功能的参数
     * @return bool|string */
    public function getPrepayId($openid, $body, $out_trade_no, $total_fee, $notify_url, $trade_type = "JSAPI", $goods_tag = null) {
        // 生成wechat对象
        $WechatPay = new \Wechat\WechatPay();
        $prepayId = $WechatPay->getPrepayId($openid, $body, $out_trade_no, $total_fee, $notify_url, $trade_type = "JSAPI", $goods_tag = null);
        return $prepayId;
    }
}