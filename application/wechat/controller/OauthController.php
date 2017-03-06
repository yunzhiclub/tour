<?php
/**
 * 授权认证
 */
namespace app\wechat\controller;
use think\Request;
use think\Session;
use think\Url;
use EasyWeChat\Foundation\Application;
use think\Cookie;
use app\model\CustomerModel;


class OauthController extends WechatController {
    protected $app;                     // 微信根对象
    public function __construct() {
        parent::__construct();
        $config = $this->config;

        // 设置回调函数
        $config['oauth']['callback'] = Url::build('getcustomerAndSession');
        $this->app = new Application($config);
    }

    /**
     * 授权认证入口
     * @return   303                   跳转至微信官方服务器认证界面
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T07:51:33+0800
     */
    public function index() {
        $callbackUrl = Request::instance()->param('callback');
        if (is_null($callbackUrl)) {
            throw new \Exception("do not receive callbackurl");
        }
        session('callbackUrl', $callbackUrl);
        if (is_null(Session::get('wechat_customer'))) {
            return $this->app->oauth->redirect();
        } else {
            return $this->redirectToCallbackUrl();
        }
    }

    /**
     * 获取用户的数据，并进行session存储
     * @return   [type]                   [description]
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T08:10:59+0800
     */
    public function getcustomerAndSession() {
        // 获取 OAuth 授权结果用户信息
        $customer = $this->app->oauth->customer(); 
        Session::set('wechat_customer', $customer);
        return $this->redirectToCallbackUrl();
    }

    /**
     * 跳转回用户传入的地址   
     * @return   303
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T07:53:57+0800
     */
    private function redirectToCallbackUrl() {
        $customer = Session::get('wechat_customer');

        // 判断用户是否是第一次登陆系统
        // 1 查找数据库是否存在
        $CustomerModel = CustomerModel::get($customer['original']['openid']);
        
        // 判断是否该用户是否存在
        if (is_null($CustomerModel)) {
            // 保存数据
            $CustomerModel = new CustomerModel;
            $data['openid'] = $customer['original']['openid'];
            $data['nickname'] = $customer['original']['nickname'];
            $data['sex'] = $customer['original']['sex'];
            $data['province'] = $customer['original']['province'];
            $data['country'] = $customer['original']['country']; 
            $data['city'] = $customer['original']['city']; 
            $data['headimgurl'] = $customer['original']['headimgurl']; 

            // save
            $CustomerModel->save($data);
        }
        $callbackUrl = Session::get('callbackUrl') . '?openid=' . $customer['id'];
        return $this->redirect($callbackUrl);
    }
}