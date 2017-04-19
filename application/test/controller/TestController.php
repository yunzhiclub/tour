<?php
namespace app\test\controller;

use think\Controller;
use think\Request;
use app\model\TestModel;

class TestController extends Controller
{
    public function index()
    {
        // $id = Request::instance()->get('id');
        // $test = TestModel::get($id);
        // var_dump($test);
        $date = date("Ymd");
        $timestamp = substr(time(), -5, 5);
        var_dump(sprintf("%05d", 100000 - 2244));
        var_dump($timestamp);
        var_dump(time());
    }
}