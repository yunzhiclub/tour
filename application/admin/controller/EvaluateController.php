<?php
namespace app\admin\controller;
use think\Controller;
/**
* 评价管理
*/
class EvaluateController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }

    public function star()
    {
        return $this->fetch();
    }
}