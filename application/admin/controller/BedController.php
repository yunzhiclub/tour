<?php
namespace app\admin\controller;
use think\Request;
use app\model\BedModel;
use app\model\InviteModel;
/**
* 床位
*/
class BedController extends IndexController
{
    
    public function index()
    {
        // 获取传过来的invite id
        $id = Request::instance()->param('id/d');

        // 获取邀约model
        $InviteModel = InviteModel::get($id);
        $this->assign('InviteModel', $InviteModel);

        // 根据邀约id获取所有的床位详情
        $BedModel = new BedModel;
        $map['invite_id'] = $id;

        // 增加模糊查询
        $number = Request::instance()->get('number');
        $BedModels = $BedModel->where($map)->where('number', 'like', '%' . $number . '%')->paginate();
        $this->assign('BedModels', $BedModels);

        return $this->fetch();
    }
    
    public function detail()
    {
        
        //获取传过来的Bed id
        $id = Request::instance()->param('id/d');

        // 根据bedid获取床位信息
        $Bed = BedModel::get($id);
        $this->assign('bed', $Bed);
        return $this->fetch();
    }
    
}
