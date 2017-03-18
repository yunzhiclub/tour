<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2017 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace think\response;

use think\Facade;

class Redirect extends Response
{

    protected $options = [];

    // URL参数
    protected $params = [];

    public function __construct($data = '', $code = 302, array $header = [], array $options = [])
    {
        parent::__construct($data, $code, $header, $options);
        $this->cacheControl('no-cache,must-revalidate');
    }

    /**
     * 处理数据
     * @access protected
     * @param mixed $data 要处理的数据
     * @return mixed
     */
    protected function output($data)
    {
        $this->header['Location'] = $this->getTargetUrl();
        return;
    }

    /**
     * 重定向传值（通过Session）
     * @access protected
     * @param string|array  $name 变量名或者数组
     * @param mixed         $value 值
     * @return $this
     */
    public function with($name, $value = null)
    {
        $session = Facade::make('Session');
        if (is_array($name)) {
            foreach ($name as $key => $val) {
                $session->flash($key, $val);
            }
        } else {
            $session->flash($name, $value);
        }
        return $this;
    }

    /**
     * 获取跳转地址
     * @return string
     */
    public function getTargetUrl()
    {
        return (strpos($this->data, '://') || 0 === strpos($this->data, '/')) ? $this->data : Facade::make('url')->build($this->data, $this->params);
    }

    public function params($params = [])
    {
        $this->params = $params;
        return $this;
    }

    /**
     * 记住当前url后跳转
     * @return $this
     */
    public function remember()
    {
        Facade::make('Session')->set('redirect_url', Facade::make('request')->url());
        return $this;
    }

    /**
     * 跳转到上次记住的url
     * @return $this
     */
    public function restore()
    {
        $session = Facade::make('Session');
        if ($session->has('redirect_url')) {
            $this->data = $session->get('redirect_url');
            $session->delete('redirect_url');
        }
        return $this;
    }
}
