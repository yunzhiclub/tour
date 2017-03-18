<?php
/**
 * 用户
 */
namespace app\wechat\service;
use EasyWeChat\Foundation\Application;

class UserService extends ServiceService {
    /**
     * 通过OPNEID获取用户基本信息
     * @return   array 用户信息
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T17:29:39+0800
     */
    public function getUserByOpenid($openid) {
        $App = new Application($this->config);
        $AppUser = $App->user;
        $user = $App->user->get($openid);
        return $user;
    }
}