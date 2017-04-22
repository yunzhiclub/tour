<?php
namespace app\model;
use app\model\DestinationCityModel; 

/**
 * 首页城市
 */
class HomeCityModel extends ModelModel
{
	private $DestinationCityModel = null;
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
		/**
	 * 获取DestinationCityModel通过本对象中的destination_city_id
	 * @author zhangmengxiang
	 * @return Object Route对象
	 */
	public function getDestinationCityModel()
	{
		if (null === $this->DestinationCityModel) {
			$DestinationCityModelId = $this->getData('destination_city_id');
			$this->DestinationCityModel = DestinationCityModel::get($DestinationCityModelId);
		}

		return $this->DestinationCityModel;
	}
	/**
	 * 根据用户的筛选条件查询信息
	 * @param  array $data [用户的查询条件]
	 * @return [object]       [首页城市信息]
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