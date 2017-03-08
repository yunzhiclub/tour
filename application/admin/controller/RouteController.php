<?php
namespace app\admin\controller;
use think\Controller;
/**
* 路线管理
*/
class RouteController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
    public function add()
    {
    	return $this->fetch();
    }
    public function edit()
    {
    	return $this->fetch();
    }
    public function detail() 
    {
        return $this->fetch();
    }
}