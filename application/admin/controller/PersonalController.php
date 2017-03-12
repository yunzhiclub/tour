<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\model\UserModel;
/**
* 个人中心管理
*/
class PersonalController extends IndexController
{
    
    public function index()
    {	
    	//获取当前用户
    	$currentUserModel = UserModel::getCurrentUserModel();
    	$this->assign('currentUserModel', $currentUserModel);
        return $this->fetch();
    }

    public function update()
    {
    	$data = Request::instance()->param();

        //判断原密码是否为正确
        if (false === UserModel::passwordIsTrue($data['password'])) {
            return $this->error('原密码错误');
        }
        //判断两次输入的密码是否一致
        if ($data['newpassword'] !== $data['repassword']) {
            return $this->error('两次输入的密码不一致');
        }

        //验证密码的长度是否符合要求
        $length = strlen($data['newpassword']);
        if ($length < 6 || $length > 20) {
            return $this->error('密码的长度不符合要求');
        }

        //更新用户数据
        $currentUserModel = UserModel::getCurrentUserModel();
        
        if (false === $currentUserModel->saveUserInfo($data)) {
            return $this->error($currentUserModel->getError());
        }

        return $this->success('保存成功');
    }
}