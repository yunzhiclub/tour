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
		$Selfs = $Self->where($map)->select();
		//获取前四个首页城市
		$fourSelfs = array_splice($Selfs, 0, 4);
		foreach ($fourSelfs as $fourSelf) {
			$id = $fourSelf->getData('country_id');
			$results[] = CountryModel::get($id)->getData('name');
		}
		return $results;
	}
}