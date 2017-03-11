<?php
namespace app\admin\controller;

use think\Controller;
use app\model\UserModel;        //用户管理

class LoginController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    // 处理登录数据
    public function login()
    {
        $username = input('post.username');
        $password = input('post.password');

        // 验证用户名是否存在
        $map = array('username' => $username );
        $User = UserModel::get($map);
        if (UserModel::login($username, $password)) {
            return $this->success('登录成功', url('Index/index'));
        } else {
            return $this->error('用户名或密码错误', url('index'));
        }
    }

    // 注销
    public function logOut()
    {
        if (UserModel::logOut()) {
            return $this->success('注销成功', url('index'));
        } else {
            return $this->error('注销失败', url('index'));
        }
    }
}
