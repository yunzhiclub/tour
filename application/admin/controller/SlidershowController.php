<?php
namespace app\admin\controller;
use think\Controller;
/**
* 幻灯片管理
*/
class SlidershowController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}