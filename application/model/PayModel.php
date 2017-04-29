<?php
/**
 * Created by PhpStorm.
 * User: zhenjie
 * Date: 17-4-27
 * Time: 下午9:50
 */
class PayModel {

    // 获取Media类的配置文件
    public function getOptions() {
        $config = $this->config;
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
}