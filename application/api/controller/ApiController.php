<?php
namespace app\api\controller;
use think\Controller;
use think\Request;
use think\Config;
use think\Response;
use think\exception\HttpResponseException;
use think\Log;

/**
* 统一api控制器
*/
class ApiController extends Controller
{
    static protected $defaultCode = 10001;

    /**
     * 用户请求响应(供子类统一使用进行数据返回)
     * @param    mix                    $data   array:返回数据 | int:返回错误码
     * @param    array                    $header header头信息
     * @return   json
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T16:32:12+0800
     */
    protected function response($data = [], $message = '', $header = []) {
        // 设置返回类型为json
        Config::set('default_return_type', 'json');
        
        // 传入的变量类型非法，则置错误码为10002
        if (!is_numeric($data) && !is_array($data) && !is_object($data)) {
            $code = 10002;
            $this->response($code, $message, $header);

        // 传入的变量类型合法
        } else {
            // 如果传入的类型为数字，则为错误码赋值
            if (is_numeric($data))  {
                $code = $data;

                // 错误码不存在，则重置为默认错误码
                if (!isset($this::$errors[$code])) {
                    $code = $this::$defaultCode;
                }

                // 依据错误码，拼接错误数据
                $request = Request::instance();
                $result = [
                    "request"       => $request->url(true),
                    "errorCode"    => $code,
                    "error"         => $this::$errors[$code][0] . ': ' . $this::$errors[$code][1] . ': ' . $message,         
                ];

            // 未传入错误码，则返回正确的信息
            } else {
                $result = [
                    'data' => $data,
                ];
            }
        }

        // 设置请求时间，返回
        $result['time'] = $_SERVER['REQUEST_TIME'];
        $type     = $this->getResponseType();
        $accessControlAllowOrigin = Config::get('api.access_control_allow_origin');
        $accessControlAllowOrigin = $accessControlAllowOrigin ? $accessControlAllowOrigin : '*';
        $header['Access-Control-Allow-Origin'] = $accessControlAllowOrigin;
        $header['Access-Control-Allow-Methods'] = 'GET,POST,PUT,DELETE,OPTIONS';
        $header['Access-Control-Allow-Headers'] = 'Content-Type';
        $response = Response::create($result, $type)->header($header);
        throw new HttpResponseException($response);
    }

    /**
     * 获取当前的response 输出类型
     * @access protected
     * @return string
     */
    protected function getResponseType()
    {
        $isAjax = Request::instance()->isAjax();
        return $isAjax ? Config::get('default_ajax_return') : Config::get('default_return_type');
    }

    // 所有的报错信息，必须放在这里定义
    static protected $errors = [
        10001 => ['not found the error code', '未找到对应的错误码详情信息'],
        10002 => ['system error: the type of data for response function not numeric or array', '系统错误：传到responese函数的data变量，既不是int又不是数组'],
        10003 => ['catch system exception', '系统发生异常,请查看日志'],
        20001 => ['openid is null', '未接收到openid'],
        20002 => ['openid length incorect', 'openid 长度有误'],
        20003 => ['user does not exists', '用户不存在'], 
        20004 => ['IDCard formart is incorect', '身份证号码格式不正确'],

    ];

    /**
     * 验证openid位数是否正确
     * @return   [type]                   [description]
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T16:59:44+0800
     */
    protected function checkOpenid() {
        return true;
    }

    /**
     * 记录发生的异常到日志文件
     * @param    Exception                   $e 异常
     * @return   null                      
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T18:11:45+0800
     */
    protected function exception($e) {
        // 排除ThinkPHP的HTTP异常
        if ($e instanceof \think\exception\HttpResponseException) {
            throw $e;

        // 日志记录异常trace，供出错后分析
        } else {
            Log::record('系统发生异常:' . $e->getTraceAsString());
            return $this->response(10003, $e->getMessage());
        }
    }
}
