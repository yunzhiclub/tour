<?php
namespace app\model;

/**
 * 国家
 */
class CountryModel extends ModelModel
{
	private $RegionModel = null;
	/**
	 * 获取该国家对应的RegionModel
	 * @return Object 返回的ReginModel对象
	 */
	public function getRegionModel()
	{
		if (null === $this->RegionModel) {
			$RegionId = $this->getData('region_id');
			$this->RegionModel = CountryModel::get($RegionId);
		}

		return $this->RegionModel;
	}
	/**
	 * 通过地区id  获取  该地区全部国家信息
	 * @param  int $regionId 地区id
	 * @author huangshuaibin
	 * @return array           全部国家信息
	 */
	public static function getCountrysByRegionId($regionId)
	{
		//查询条件
	   	$map = array('region_id' => $regionId);

	   	//根据地区id查询
	   	$Country = new CountryModel;
		$countrys = $Country->where($map)->select();
		
		return $countrys;
	}
	public function isXXXDestinationCity()
	{
		$DestinationCityModels = DestinationCityModel::all();

		foreach ($DestinationCityModels as $DestinationCityModel) {
			if ($DestinationCityModel->is_delete === 0 && $DestinationCityModel->country_id === $this->getData('id')) {
					return false;
			}			
		}

		return true;
	}
	
	/**
	 * 根据国家id获取对应的目的地城市id
	 * @param  int $id 国家id
	 * @return array     
	 * @author chuhang 
	 */
	static public function getDestinationCityIdsByConuntryId($id)
	{
		//获取改过家对应的目的地城市
		$map = [];
		$map['is_delete'] = 0;
		$map['country_id'] = $id;
		$DestinationCityModel = new DestinationCityModel;
		$DestinationCityModels = $DestinationCityModel->where($map)->select();

		//获取目的地城市的id
		foreach ($DestinationCityModels as $DestinationCityModel) {
			$result[] = $DestinationCityModel->getData('id');
		}

		//判断该国家是否有对应的目的地城市
		if (isset($result)) {
			return $result;
		}

		return null;

	}
}
