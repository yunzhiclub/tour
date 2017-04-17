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
		//获取三个地区的id和名称
		foreach ($threeSelves as $key => $threeSelf) {
			$results[$key]['id'] = $threeSelf->getData('region_id');
			$results[$key]['name'] = RegionModel::get($results[$key]['id'])->getData('name');
		}
		return $results;
	}
}