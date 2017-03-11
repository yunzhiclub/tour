<?php
namespace app\admin\controller;

use think\Controller;
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
}