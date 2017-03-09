<?php
namespace app\admin\controller;
use think\Model;
class CountryController extends IndexController
{
	public function country()
	{
		return $this->fetch('Region\country');
	}
	public function edit()
	{
		return $this->fetch('Region\editcountry');
	}
	public function add()
	{
		return $this->fetch('Region\addcountry');
	}


}