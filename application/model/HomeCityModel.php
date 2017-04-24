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
		//	获取所有未删除的首页城市
		$map['is_delete'] = '0';
		$Self = new self;
		$Selves = $Self->where($map)->select();

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