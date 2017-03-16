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