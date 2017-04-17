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
		$Selfs = $Self->where($map)->select();
		//获取前三个首页地区
		$threeSelfs = array_splice($Selfs, 0, 3);
		foreach ($threeSelfs as $threeSelf) {
			$id = $threeSelf->getData('region_id');
			$results[] = RegionModel::get($id)->getData('name');
		}
		return $results;
	}
}