<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function test()
    {
    	return 'test';
    }

    public function index()
    {
    	return $this->fetch();
    }

    public function welcome()
    {
    	return '欢迎来到后台！';
    }
}
