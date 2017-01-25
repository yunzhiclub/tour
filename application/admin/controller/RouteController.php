<?php
namespace app\admin\controller;
use think\Controller;
/**
* 路线管理
*/
class RouteController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}