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
		//	获取所有未删除的首页城市
		$map['is_delete'] = '0';
		$Self = new self;
		$Selves = $Self->where($map)->select();
		var_dump($Selves);

		//  截取四个首页城市
		$i = 0;
		foreach ($Selves as $key => $Self) {
			//  根据目的地城市id获取目的地城市名称
			$DestinationCityId = $Self->getData('destination_city_id');
			$map['id'] = $DestinationCityId;
			$DestinationCityModel = DestinationCityModel::get($map);
			//  判断目的地城市是否存在
			if (!empty($DestinationCityModel->getData())) {
				$results[$i]['id'] = $DestinationCityId;
				$results[$i]['name'] = $DestinationCityModel->getData('name');
				//$i为3时跳出循环
				$i++;
				if ($i === 4) {
					break;
				}
			}
		}
		return $results;
	}
}