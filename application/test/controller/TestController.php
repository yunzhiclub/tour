<?php
namespace app\test\controller;

use think\Controller;
use think\Request;
use app\model\TestModel;

class TestController extends Controller
{
    public function index($id)
    {
        $id = Request::instance()->get('id');
        $test = TestModel::get($id);
        var_dump($test);
    }
}