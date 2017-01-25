<?php
namespace app\admin\controller;
use think\Controller;
/**
* 后台首页
*/
class IndexController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}
