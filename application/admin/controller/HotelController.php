<?php
namespace app\admin\controller;
use think\Controller;
/**
* 酒店管理
*/
class HotelController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}