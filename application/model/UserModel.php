<?php
namespace app\model;
use think\Session;                      // session


class UserModel extends ModelModel
{	
	static private $currentUserModel = null;  //当前登陆用户

	/**
	 * 获取当前用户model
	 * @return object 当前用户
	 * @author chuhang 
	 */
	static public function getCurrentUserModel() 
	{
		if (null === self::$currentUserModel) {
			$username = Session::get('username');
			$map['username'] = $username;
			self::$currentUserModel = UserModel::get($map);
		}

		return self::$currentUserModel;
	}

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
	 * 判断用户名密码是否正确
	 * @param  string $username 用户名
	 * @param  string $password 密码
	 * @return boolean           正确为ture，反之
	 * @author chuhang 
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
                return true;
            }
        }        
        return false;    
    }

    /**
     * 验证密码
     * @param  string $password 密码
     * @return boolean           正确为true，反之
     */
    public function checkpassword($password)
    {
        if($this->getData('password') === $this->encryptPassword($password)) {
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * 注销
     * @return boolean 
     * @author chuhang 
     */
    static public function logout()
    {
        // 销毁tokens
        Session::clear();
        return true;
    }

    /**
     * 密码加密，例：加密前admin , 69bfbc2e8df54af9fe751b3dfa4d2e9964ffa496
     * @param  string $password 密码
     * @return string           加密后的密码
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2017-02-21T08:59:42+0800
     */
    static public function encryptPassword($password)
    {
        $encryptedpassword = sha1(md5($password) + 'mengyunzhi');
        return $encryptedpassword;
    }

    /**
     * 判断密码是否正确
     * @param  string $data 用户提交的密码
     * @return boolean       true为正确，反之。
     * @author chuhang 
     */
    static public function passwordIsTrue($data){

        $password = self::getCurrentUserModel()->getData('password');

        if (self::encryptPassword($data) === $password) {
            return true;
        }
        return false;
    }

    /**
     * 更新用户数据
     * @param  array $data 用户数据
     * @return boolean       保存成功为true，反之
     * @author chuhang 
     */
    public function saveUserInfo($data) {
        $this->phonenumber = $data['phonenumber'];
        $this->email = $data['email'];
        $this->name = $data['name'];
        $this->password = self::encryptPassword($data['newpassword']);
        
        return $this->save();
    }
}
