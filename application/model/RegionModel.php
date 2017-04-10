<?php
namespace app\model;

/**
 * 地区
 * @author huangshuaibin
 */
class RegionModel extends ModelModel
{
	/**
	 * 判断该地区是否包含某城市
	 * @return boolean 
	 * @author zhangmengxiang 
	 */
	public function isIncludeCountry()
	{
		$CountryModels = CountryModel::all();

		foreach ($CountryModels as $CountryModel){ 	
			if ($CountryModel->region_id === $this->getData('id')){
				return false;
			}
		}

	}

	/**
	 * 获取地区中所包含的目的地城市id
	 * @param  int $id 地区id
	 * @return array     目的地城市
	 * @author chuhang 
	 */
	static public function getDestinationCityIdsByRegionId($id)
	{
		//获取地区中包含的国家
		$map = [];
		$map['is_delete'] = 0;
		$map['region_id'] = $id;
		$CountryModel = new CountryModel;
		$CountryModels = $CountryModel->where($map)->select();

		//把地区中包含的目的地城市id放在$DestinationIds
		$DestinationIds = [];
		foreach ($CountryModels  as $CountryModel) {
			$countryId = $CountryModel->getData('id');
			$DestinationCityIds = $CountryModel::getDestinationCityIdsByConuntryId($countryId);

			foreach ($DestinationCityIds as $DestinationCityId) {
				array_push($DestinationIds, $DestinationCityId);
			}
		}
		return $DestinationIds;
	}

}
