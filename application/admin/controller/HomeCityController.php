<?php
namespace app\admin\controller;
use think\Controller;
/**
* 后台首页
*/
class HomeCityController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
}
