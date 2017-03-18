<?php
namespace app\wechat\service;
use think\Config;
/**
 * 服务层根类
 */
class ServiceService {
    protected $config;      // 微信配置信息

    public function __construct() {
        $this->config = Config::get('wechat');
    }
}