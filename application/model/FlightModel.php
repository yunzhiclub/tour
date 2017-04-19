<?php
namespace app\model;

/**
 * 航班管理
 */
class FlightModel extends ModelModel
{
	private $StartCityModel = null;		//对应的出发城市模型
	private $DestinationCityModel = null;	 //对应的目的地城市模型

	/**
	 * 当前模型与出发城市关系为n:1
	 * @return lists StartCityModels
	 * @author chuhang 
	 */
	public function StartCityModel() {

		if (null === $this->StartCityModel) {
			$this->StartCityModel = StartCityModel::get($this->getData('up_city_id'));
		}

		return $this->StartCityModel;
	}

	/**
	 * 当前模型与目的地城市的型为n:1
	 * @return lists DestinationCityModel
	 * @author chuhang 
	 */
	public function DestinationCityModel() {

		if (null === $this->DestinationCityModel) {
			$this->DestinationCityModel = DestinationCityModel::get($this->getData('down_city_id'));
		}

		return $this->DestinationCityModel;
	}


	/**
	 * 截取时间长度，去除不必要的显示，如02:44:00,截取后02:44
	 * @param  [String] $time [所要截取的时间]
	 * @return [string]       [截取后的时间]
	 */
	static public function substrTime($time) {
		$result = substr($time, 0, -3);
		return $result;
	}
}
