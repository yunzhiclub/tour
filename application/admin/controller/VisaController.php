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
}