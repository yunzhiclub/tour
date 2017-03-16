<?php
namespace app\admin\controller;
use think\Controller;

class InviteController extends IndexController
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

	public function bedDetail()
	{
		return $this->fetch('Bed/index');
	}
}
