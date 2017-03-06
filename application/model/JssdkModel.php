<?php
namespace app\model;
use think\Model;
use think\Cache;
use think\Config;
/*
jssdk处理类
*/
class JssdkModel {
	   private $appId;
    private $appSecret;
  	 private $url;
     protected $pathconfig = ROOT_PATH . 'public' . DS . 'upload' . DS;
     protected $config;
  	public function __construct($appId = null, $appSecret= null, $url = null) {
    	$this->appId = $appId;
    	$this->appSecret = $appSecret;
    	$this->url = $url;
      $this->config = Config::get('wechat');
  	}

  	public function getSignPackage() {
    	$jsapiTicket = $this->getJsApiTicket();

    	// 注意 URL 一定要动态获取，不能 hardcode.
    	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    	// $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    	$url = $this->url;
    	$timestamp = time();
    	$nonceStr = $this->createNonceStr();

    	// 这里参数的顺序要按照 key 值 ASCII 码升序排序
   		 $string = "jsapi_ticket=".$jsapiTicket."&noncestr=".$nonceStr."&timestamp=".$timestamp."&url=".$url;

    	$signature = sha1($string);

    	$signPackage = array(
      	"appId"     => $this->appId,
      	"nonceStr"  => $nonceStr,
      	"timestamp" => $timestamp,
      	"url"       => $url,
      	"signature" => $signature,
      	"rawString" => $string,
    	);
    	return $signPackage; 
  	}

  	private function createNonceStr($length = 16) {
    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    	$str = "";
    	for ($i = 0; $i < $length; $i++) {
     	 $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    	}
   	 	return $str;
  	}

  	private function getJsApiTicket() {
   		 // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
    	//$data = json_decode($this->get_php_file("jsapi_ticket.php"));
    	$data = array(
    		'expire_time' => null,
    		'jsapi_ticket' => null,
    		);
  		$data = Cache::get("jsapi_ticket");
    	if ($data['expire_time'] < time()) {
     		 $accessToken = $this->getAccessToken();
     		 // 如果是企业号用以下 URL 获取 ticket
      		// $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
     		 $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=".$accessToken;
      		$res = json_decode($this->httpGet($url));
      		$ticket = $res->ticket;
      		if ($ticket) {
      		  	$data['expire_time'] = time() + 7000;
       		 	$data['jsapi_ticket'] = $ticket;
      		  	// $this->set_php_file("jsapi_ticket.php", json_encode($data));
      		  	Cache::set("jsapi_ticket", $data, 0);
     	 		}
    	} else {
      		$ticket = $data['jsapi_ticket'];
    	}

    	return $ticket;
  }

  private function getAccessToken() {
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
    //$data = json_decode($this->get_php_file("access_token.php"));
    $data = array(
    		'expire_time' => null,
    		'access_token' => null,
    		);
    $data = Cache::get("access_token");

    if ($data['expire_time'] < time()) {
      // 如果是企业号用以下URL获取access_token
      // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appId."&secret=".$this->appSecret;
      $res = json_decode($this->httpGet($url));
      $access_token = $res->access_token;
      if ($access_token) {
        $data['expire_time'] = time() + 7000;
        $data['access_token'] = $access_token;
        // $this->set_php_file("access_token.php", json_encode($data));
        Cache::set("access_token", $data, 0);
      }
    } else {
      $access_token = $data['access_token'];
    }
    return $access_token;
  }

  private function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
   // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
  }

  // 获取Media类的配置文件
  public function getOptions() {
      $config = $this->config;
      $config['appid'] = $config['app_id'];
      $config['appsecret'] = $config['secret'];
      $config['encodingaeskey'] = '';
      $config['mch_id'] = '';
      $config['partnerkey'] = '';
      $config['ssl_cer'] = '';
      $config['ssl_key'] = '';
      $config['cachepath'] = '';
      return $config;
    }

  /*
   * description 从微信服务器读取图片，然后下载到本地服务器并把数据url返回回来
   * @param serverId(string)
   * @return success $data(string)文件和上一级文件夹名字可以存入数据库 | error false(boolen)
   */
  public function download($serverId = null) {
    
    // 获取options
    $options = $this->getOptions();

    // 配置jssdk
    \Wechat\Loader::config($options);

    // 实例化Media类
    $Media = new \Wechat\WechatMedia(); 
    $result = $Media->getMedia($serverId);
    if ($result === false) {
      return false;
    }

    // 拼出保存图片的地址
    $lateFolderName = date('Ymd', time());
    $fileFolder = $this->pathconfig . $lateFolderName;
    if (!is_dir($fileFolder)) {
      mkdir($fileFolder);
    }

    $fileName = sha1($result) . '.png';
    $path = $fileFolder . DS . $fileName;
    
    // 保存图片
    $state = file_put_contents($path, $result); 
    if ($state === false) {
      return false;
    }
    
    // 返回文件和上一级文件夹名字
    $data = $lateFolderName . DS . $fileName;
    return $data;
  }

  // 获取微信jssdk的配置信息
  public function getConfig($url) {

    // 获取app_id和secret和url
    $config = $this->config;
    $app_id = $config['app_id'];
    $secret = $config['secret'];
    
    // 获取jssdk配置
    $jssdkModel = new self($app_id, $secret, $url);
    $signPackage = $jssdkModel->GetSignPackage();

    // 清理内存
    unset($signPackage['rawString']);
    return $signPackage;
  }
}