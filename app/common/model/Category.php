<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
	protected $autoWriteTimestamp = true;
	public function add($data)
	{
		$data['status'] = '1';
		// $data['create_time'] = time();
		return $this->save($data);
	}

	public function getNormalFirstCategory()
	{
		$data = [
			'status' => 1,
			'parent_id' => 0,
		];

		$order = [
			'id' => 'desc'
		];

		return $this->where($data)
			->order($order)
			->select();
	}


	public function getFirstCategorys()
	{
		$data = [
			'parent_id' => 0,
			'status' => ['neq', -1],
		];

		$order = [
			'id' => 'desc',
		];

		$result = $this->where($data)
			->order($order)
			->select();

		return $result;
	}
}