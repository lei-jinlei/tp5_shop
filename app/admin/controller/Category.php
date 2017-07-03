<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class category extends Controller
{
    public function _initialize()
    {
        $this->obj = model('Category');
    }

    public function index()
    {
        $parentId = input('get.parent_id', 0, 'intval');
        $categorys = $this->obj->getFirstCategorys($parentId);

        return $this->fetch('', [
            'categorys' => $categorys,
        ]);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id = 0)
    {
        if ($id < 1) {
            $this->error('参数不合法');
        }

        $category = $this->obj->get($id);
        $categorys = $this->obj->getNormalFirstCategory();
        return $this->fetch('', [
            'category' => $category,
            'categorys' => $categorys,
        ]);
    }


    /**
     * 添加分类.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function add(Request $request)
    {
        $categorys = $this->obj->getNormalFirstCategory();
        return $this->fetch('', [
            'categorys' => $categorys,
        ]);
    }

    /**
     * 保存指定资源
     * @return \think\Response
     */
    public function save(Request $request)
    {
        /**
         * 做下严格的判定
         * @var [type]
         */
        if (!request()->post()) {
            $this->error('请求失败');
        }
        $data = input('post.');
        $validate = validate('Category');
        if (!$validate->scene('add')->check($data)) {
            $this->error($validate->getError());
        }
        if (!empty($data['id'])) {
            return $this->update($data);
        }

        // 把$data 提交给model层
        $res = $this->obj->add($data);
        if ($res) {
            $this->success('新增成功');
        } else {
            $this->error('增加失败');
        }
    }

    public function update($data)
    {
        $res = $this->obj->save($data, ['id' => intval($data['id'])]);
        if ($res) {
            $this->success('更新成功');
        } else {
            $this->error('更新失败');
        }
    }

    public function listorder($id, $listorder)
    {
        $res = $this->obj->save(['listorder'=>$listorder], ['id'=>$id]);
        if ($res) {
            $this->result($_SERVER['HTTP_REFERER'], 1, 'success');
        } else {
            $this->result($_SERVER['HTTP_REFERER'], 0, '更新失败');
        }
    }
}
