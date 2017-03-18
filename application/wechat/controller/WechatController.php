<?php
namespace app\wechat\controller;
use think\Config;
use think\Controller;
class WechatController extends Controller{
    protected $config;                  // 微信配置信息
    
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->config = Config::get('wechat');
    }
}