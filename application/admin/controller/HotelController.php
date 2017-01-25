<?php
namespace app\admin\controller;
use think\Controller;
/**
* 酒店管理
*/
class HotelController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
}