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

		//当$i=3时跳出循环
		$i = 0;
		foreach ($Selves as $key => $Self) {
			//获取地区模型
			$countryId = $Self->getData('country_id');
			$map['id'] = $countryId;
			$CountryModel = CountryModel::get($map);
			//判断地区是否存在
			if (!empty($CountryModel->getData())) {
				$results[$i]['id'] = $countryId;
				$results[$i]['name'] = $CountryModel->getData('name');
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