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

		//当$i=3时跳出循环
		$i = 0;
		foreach ($Selves as $key => $Self) {
			//获取地区模型
			$regionId = $Self->getData('region_id');
			$map['id'] = $regionId;
			$RegionModel = RegionModel::get($map);
			//判断地区是否存在
			if (!empty($RegionModel->getData())) {
				$results[$i]['id'] = $regionId;
				$results[$i]['name'] = $RegionModel->getData('name');
				//$i为3时跳出循环
				$i++;
				if ($i === 3) {
					break;
				}
			}
		}
		 
		return $results;
	}
}