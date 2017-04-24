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
	/**
	 * 根据用户的筛选条件查询信息
	 * @param  array $data [用户的查询条件]
	 * @return [object]       [首页地区信息]
	 * @author zhangmengxiang
	 */
	public function getSearchInfo($data) {
        $map['is_delete'] = 0;

		if (isset($data['expiration_time']) && $data['expiration_time'] !== '0') {
			$map['expiration_time'] = $data['expiration_time'];
		}
		if (isset($data['weight']) && $data['weight'] !== '0') {
			$map['weight'] = $data['weight'];
		}
		
		
		$this->where($map);
		
		unset($map);
		return $this;
	}
}