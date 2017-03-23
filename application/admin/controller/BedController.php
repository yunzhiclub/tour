<?php
namespace app\admin\controller;
use think\Request;
use app\model\BedModel;
use app\model\UserModel;
/**
* 床位
*/
class BedController extends IndexController
{
    
    public function index()
    {
        return $this->fetch();
    }
    
    public function detail()
    {
        
        //获取所需要的床位详情
        $id = Request::instance()->param('id');
        $Bed = BedModel::get($id);
        $this->assign('Bed', $Bed);
        return $this->fetch();
    }
    
}
