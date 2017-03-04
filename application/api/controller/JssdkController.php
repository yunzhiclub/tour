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
	
	// 获取jssdk的配置
	public function getConfig() {

		$url = Request::instance()->param('url');
		
		$jssdkModel = new JssdkModel();
		$signPackage = $jssdkModel->getConfig($url);

		return $this->response($signPackage);
	}
}