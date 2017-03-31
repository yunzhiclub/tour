<?php
namespace app\api\controller;
use app\model\InviteBedCustomerViewModel;

class TestController extends ApiController 
{
	$InviteBedCustomerViewModel = InviteBedCustomerViewModel::all();
	var_dump($InviteBedCustomerViewModel);
	die();
}