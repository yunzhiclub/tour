<?php
namespace app\model;

/**
 * 首页城市
 */
class HomeCityModel extends ModelModel
{
	/**
	 * 获取显示的首页城市
	 * @return array 
	 * @author chuhang 
	 */
	static public function getFourHomeCityNames()
	{
		$map['is_delete'] = '0';
		$Self = new self;
		$Selves = $Self->where($map)->select();
		//获取前四个首页城市
		$fourSelves = array_splice($Selves, 0, 4);
		//获取四个城市的id和名称
		foreach ($fourSelves as $key => $fourSelf) {
			$results[$key]['id'] = $fourSelf->getData('country_id');
			$results[$key]['name'] = CountryModel::get($results[$key]['id'])->getData('name');
		}
		return $results;
	}
}