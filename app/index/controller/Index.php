<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
    
    public function index()
    {
    	$this->assign('title','首页');
    	$this->assign('controler','controler');
    	$city['name'] = 'city.name';
    	$this->assign('city',$city);
    	$this->assign('citys','citys');
    	$this->assign('user','');
    	$this->assign('cats','');
    	$this->assign('meishicates','');
    	$this->assign('datas','');
      	return $this->fetch();
    }
}
