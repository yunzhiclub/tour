<?php
namespace app\admin\controller;
use think\Controller;
/**
* 签证管理
*/
class VisaController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}