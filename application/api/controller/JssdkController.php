<?php
namespace app\api\controller;
use app\model\JssdkModel;
use think\Config;
use think\Request;
use think\File;
/**
* jsssdk处理类
*/
class JssdkController extends ApiController
{
	protected $config;
	// protected $pathconfig = ROOT_PATH . 'public' . DS . 'upload' . DS;

	public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->config = Config::get('wechat');
    }
	// 获取jssdk的配置
	public function getConfig() {

		// 获取app_id和secret和url
		$config = $this->config;
		$app_id = $config['app_id'];
		$secret = $config['secret'];
		$url = Request::instance()->param('url');
		
		// 获取jssdk配置
		$jssdkModel = new JssdkModel($app_id, $secret, $url);
		$signPackage = $jssdkModel->GetSignPackage();

		// 清理内存
		unset($signPackage['rawString']);
		$this->response($signPackage);
	}

	
	// 从微信服务器读取图片，然后下载到本地服务器并把数据url保存在数据库中
	public function download() {
		// 获取serverid
		$serverId = Request::instance()->param('serverId');
		$JssdkModel = new JssdkModel();
		$result = $JssdkModel->download($serverId);
		var_dump($result);
		die();
		
		// 保存图片url地址到数据库
	}
}