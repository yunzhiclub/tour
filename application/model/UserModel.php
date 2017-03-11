<?php
namespace app\model;
use think\Session;                      // session


class UserModel extends ModelModel
{
	/**
	 * 用户是否登陆
	 * @return   boolean                  
	 * @author chuhang
	 */
	static public function isLogin()
	{
	    if (Session::get('username') !== null) {
	        return true;
	    } else {
	        return false;
	    }
	}

	    /**
     * 用户登陆
     * @param    string                   $username 用户邮箱    
     * @param    string                   $password 密码
     * @return   bool                             正确 true 错误 false
     * @author panjie panjie@mengyunzhi.com
     * @DateTime 2016-09-12T14:57:31+0800
     */
    static public function login($username, $password)
    {
        //将用户取出
        $map = array('username' => $username);
        $UserModel = UserModel::get($map);
        
        //判断用户是否存在
        if (!empty($UserModel->username)) {
            if ($UserModel->checkpassword($password)) {
                Session::set('username', $username);
                Session::set('loginTime', time());
                return true;
            }
        }        
        return false;    
    }

        /**
     * 验证密码
     * @param  string $password 密码
     * @return bool           密码正确  true 错误 false
     * @author huangshuaibin
     */
    public function checkpassword($password)
    {
        if($this->getData('password') === $password) {
            return true;
        } else {
            return false;
        }
        
    }

    static public function logout()
    {
        // 销毁tokens
        Session::clear();
        return true;
    }

}
