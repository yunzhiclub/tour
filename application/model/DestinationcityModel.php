<?php
namespace app\model;

/**
 * 目的城市
 */
class DestinationCityModel extends ModelModel
{
	private $CountryModel = null;

	/**
	 * 获取地区地区对象
	 * @return Object 获取的地区对象
	 */
	public function getCountryModel()
	{
		if (null === $this->CountryModel) {
			$CountryId = $this->getData('country_id');

			$this->CountryModel = CountryModel::get($CountryId);
		}

		return $this->CountryModel;
	}
	/**
	 * 根据目的国家ID 取出 对应的目的城市ID
	 * @param  int $id 目的国家ID
	 * @author huangshuaibin
	 * @return array     目的城市ID的数组
	 */
	public static function getDestinationIdByCountryId($id)
	{
		//查询条件
		$map = array('country_id' => $id);

		$DestinationCity = new DestinationCityModel;
		$destinations = $DestinationCity->where($map)->select();

		//临时数组
		$temp = [];

		//取出目的
		foreach ($destinations as $key => $value) {
			array_push($temp, $value->id);
		}

		return $temp;
	}

	/**
	 * 通过国家id 获取  所有对应目的国家的所有城市
	 * @param  int $countryId 国家id
	 * @return array            目的地国家的所有城市
	 */
	public static function getDestinationCitysByCountryId($countryId)
	{
		//查询条件
		$map = array('country_id' => $countryId);

		//查询
		$DestinationCity = new DestinationCityModel;
		$DestinationCitys = $DestinationCity->where($map)->select();

		return $DestinationCitys;
	}
}
