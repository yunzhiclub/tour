<?php
namespace app\model;

/**
 * 目的城市
 */
class DestinationCityModel extends ModelModel
{
	protected $autoWriteTimestamp = true;
	/**
	 * 
	 * 根据目的国家ID 取出 对应的目的城市ID
	 * @param  int $id 目的国家ID
	 * @author huangshuaibin
	 * @return array     目的城市ID的数组
	 */
	public static function getDestinationIdByCountryId($id)
	{
		//查询条件
		$map = array('country_id' => $id);

		$Destinationcity = new DestinationCityModel;
		$destinations = $Destinationcity->where($map)->select();

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
	/**
	 *   获得对应国家ID
	 * @return object
	 * @author zhangmengxiang
	 */
	public function getCountry()
	{
		$countryId = $this->getData('country_id');
        $Country = CountryModel::get($countryId);
        return $Country;
	}
	/**
	 * 判断该目的城市是否为某航班的出发城市
	 * @return boolean 
	 * @author zhangmengxiang
	 */
	public function isXXXFlightStartCity() {
		$FlightModels = FlightModel::all();

		foreach ($FlightModels as $FlightModel) {
			if ($FlightModel->down_city_id === $this->getData('id')) {
				return false;
			}
		}

		return true;
	}
	/**
	 * 判断该目的城市是否为某路线出发城市
	 * @return boolean 
	 * @author zhangmengxiang
	 */
	public function isXXXRouteStartCity() {
		$RouteModels = RouteModel::all();

		foreach ($RouteModels as $RouteModel) {
			if ($RouteModel->destination_city_id === $this->getData('id')) {
				return false;
			}
		}

		return true;
	}

}
