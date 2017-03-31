<?php
namespace app\admin\controller;
use think\Controller;
use app\model\InviteModel;
use think\Request;

class InviteController extends IndexController
{
	public function index()
	{
		$InviteModel = new InviteModel;
		$InviteModels = $InviteModel->paginate();
		$this->assign('InviteModels', $InviteModels);
		return $this->fetch();
	}

	public function delete()
	{
		$Id = Request::instance()->param('id/d');

		if (is_null($Id) || 0 === $Id) {
			return $this->error('未获取ID信息');
		}

		$InviteModel = InviteModel::get($Id);

		if (null === $InviteModel) {
			return $this->error('不存在id为' . $Id . '的数据');
		}

		if (!$InviteModel->delete()) {
			return $this->error('删除失败:' . $InviteModel->getError());
		}

		return $this->success('删除成功', url('index'));
	}

}
