<?php
namespace app\admin\controller;

use think\Controller;
use app\model\UserModel;

/**
* 后台首页
*/
class IndexController extends Controller
{
	/**
	 * 后台登录验证
	 * @author chuhang 
	 */
    public function __construct()
    {
    	parent::__construct();
    	
        if (false === UserModel::isLogin())
        {
            return $this->error('请登录', url('login/index'));
        } 
    }

    public function index()
    {
        return $this->fetch();
    }
}
