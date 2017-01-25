<?php
namespace app\admin\controller;
use think\Controller;

/**
* 
*/
class TemplateController extends Controller
{
    
    public function icons()
    {
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }
}
