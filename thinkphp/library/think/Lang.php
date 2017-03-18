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

namespace think;

class Lang
{
    // 语言数据
    private $lang = [];
    // 语言作用域
    private $range = 'zh-cn';
    // 语言自动侦测的变量
    protected $langDetectVar = 'lang';
    // 语言Cookie变量
    protected $langCookieVar = 'think_var';
    // 语言Cookie的过期时间
    protected $langCookieExpire = 3600;
    // 允许语言列表
    protected $allowLangList = [];

    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    // 设定当前的语言
    public function range($range = '')
    {
        if ('' == $range) {
            return $this->range;
        } else {
            $this->range = $range;
        }
    }

    /**
     * 设置语言定义(不区分大小写)
     * @param string|array  $name 语言变量
     * @param string        $value 语言值
     * @param string        $range 语言作用域
     * @return mixed
     */
    public function set($name, $value = null, $range = '')
    {
        $range = $range ?: $this->range;
        // 批量定义
        if (!isset($this->lang[$range])) {
            $this->lang[$range] = [];
        }
        if (is_array($name)) {
            return $this->lang[$range] = array_change_key_case($name) + $this->lang[$range];
        } else {
            return $this->lang[$range][strtolower($name)] = $value;
        }
    }

    /**
     * 加载语言定义(不区分大小写)
     * @param string $file 语言文件
     * @param string $range 语言作用域
     * @return mixed
     */
    public function load($file, $range = '')
    {
        $range = $range ?: $this->range;
        if (!isset($this->lang[$range])) {
            $this->lang[$range] = [];
        }
        // 批量定义
        if (is_string($file)) {
            $file = [$file];
        }
        $lang = [];
        foreach ($file as $_file) {
            if (is_file($_file)) {
                // 记录加载信息
                $this->app->log('[ LANG ] ' . $_file);
                $_lang = include $_file;
                if (is_array($_lang)) {
                    $lang = array_change_key_case($_lang) + $lang;
                }
            }
        }
        if (!empty($lang)) {
            $this->lang[$range] = $lang + $this->lang[$range];
        }
        return $this->lang[$range];
    }

    /**
     * 获取语言定义(不区分大小写)
     * @param string|null   $name 语言变量
     * @param array         $vars 变量替换
     * @param string        $range 语言作用域
     * @return mixed
     */
    public function has($name, $range = '')
    {
        $range = $range ?: $this->range;
        return isset($this->lang[$range][strtolower($name)]);
    }

    /**
     * 获取语言定义(不区分大小写)
     * @param string|null   $name 语言变量
     * @param array         $vars 变量替换
     * @param string        $range 语言作用域
     * @return mixed
     */
    public function get($name = null, $vars = [], $range = '')
    {
        $range = $range ?: $this->range;
        // 空参数返回所有定义
        if (empty($name)) {
            return $this->lang[$range];
        }
        $key   = strtolower($name);
        $value = isset($this->lang[$range][$key]) ? $this->lang[$range][$key] : $name;

        // 变量解析
        if (!empty($vars) && is_array($vars)) {
            /**
             * Notes:
             * 为了检测的方便，数字索引的判断仅仅是参数数组的第一个元素的key为数字0
             * 数字索引采用的是系统的 sprintf 函数替换，用法请参考 sprintf 函数
             */
            if (key($vars) === 0) {
                // 数字索引解析
                array_unshift($vars, $value);
                $value = call_user_func_array('sprintf', $vars);
            } else {
                // 关联索引解析
                $replace = array_keys($vars);
                foreach ($replace as &$v) {
                    $v = "{:{$v}}";
                }
                $value = str_replace($replace, $vars, $value);
            }

        }
        return $value;
    }

    /**
     * 自动侦测设置获取语言选择
     * @return string
     */
    public function detect()
    {
        // 自动侦测设置获取语言选择
        $langSet = '';
        $cookie  = $this->app['cookie'];
        if (isset($_GET[$this->langDetectVar])) {
            // url中设置了语言变量
            $langSet = strtolower($_GET[$this->langDetectVar]);
            $cookie->set($this->langCookieVar, $langSet, $this->langCookieExpire);
        } elseif ($cookie->get($this->langCookieVar)) {
            // 获取上次用户的选择
            $langSet = strtolower($cookie->get($this->langCookieVar));
        } elseif (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            // 自动侦测浏览器语言
            preg_match('/^([a-z\d\-]+)/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $matches);
            $langSet = strtolower($matches[1]);
            $cookie->set($this->langCookieVar, $langSet, $this->langCookieExpire);
        }
        if (empty($this->allowLangList) || in_array($langSet, $this->allowLangList)) {
            // 合法的语言
            $this->range = $langSet ?: $this->range;
        }
        if ('zh-hans-cn' == $this->range) {
            $this->range = 'zh-cn';
        }
        return $this->range;
    }

    /**
     * 设置语言自动侦测的变量
     * @param string $var 变量名称
     * @return void
     */
    public function setLangDetectVar($var)
    {
        $this->langDetectVar = $var;
    }

    /**
     * 设置语言的cookie保存变量
     * @param string $var 变量名称
     * @return void
     */
    public function setLangCookieVar($var)
    {
        $this->langCookieVar = $var;
    }

    /**
     * 设置语言的cookie的过期时间
     * @param string $expire 过期时间
     * @return void
     */
    public function setLangCookieExpire($expire)
    {
        $this->langCookieExpire = $expire;
    }

    /**
     * 设置允许的语言列表
     * @param array $list 语言列表
     * @return void
     */
    public function setAllowLangList($list)
    {
        $this->allowLangList = $list;
    }
}
