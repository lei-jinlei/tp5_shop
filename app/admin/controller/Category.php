<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class category extends Controller
{

	public function index()
	{
		$categorys = model('Category')->getFirstCategorys();
dump(time());
dump(date('Y-m-d',time()));
        return $this->fetch('',[
            'categorys' => $categorys,
        ]);
	}

	/**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * 添加分类.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function add(Request $request)
    {
        $categorys = model('Category')->getNormalFirstCategory();
        return $this->fetch('',[
            'categorys' => $categorys,
        ]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

        /**
     * 保存指定资源
     *
     * 
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = input('post.');
        $validate = validate('Category');
        if (!$validate->scene('add')->check($data)) {
        	$this->error($validate->getError());
        }
        // 把$data 提交给model层
    	$res = model('Category')->add($data);
    	if($res){
    		$this->success('新增成功');
    	}else{
    		$this->error('增加失败');
    	}
    }
}

