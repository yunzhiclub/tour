<?php
namespace app\model;

/**
 * 首页地区
 */
class HomeRegionModel extends ModelModel
{
	/**
	 * 获取首页显示的地区，3个			
	 * @return [array] 
	 * @author chuhang 
	 */
	static public function getThreeHomeRegionNames()
	{
		$map['is_delete'] = '0';
		$Self = new self;
		$Selves = $Self->where($map)->select();
		//获取前三个首页地区
		$threeSelves = array_splice($Selves, 0, 3);
		foreach ($threeSelves as $threeSelf) {
			$id = $threeSelf->getData('region_id');
			$results[] = RegionModel::get($id)->getData('name');

		}
		return $results;
	}
}