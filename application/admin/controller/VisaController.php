<?php
namespace app\admin\controller;
use think\Controller;
/**
* 签证管理
*/
class VisaController extends IndexController
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

    public function people()
    {
    	return $this->fetch();
    }
}