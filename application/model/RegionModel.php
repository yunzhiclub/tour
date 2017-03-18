<?php
namespace app\model;

/**
 * 地区
 * @author huangshuaibin
 */
class RegionModel extends ModelModel
{
	protected $autoWriteTimestamp = true;

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

}
