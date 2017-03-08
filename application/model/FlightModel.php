<?php
namespace app\model;
use think\Model;
/**
 * 航班管理
 */
class FlightModel extends Model
{
	protected $autoWriteTimestamp = true;

	/**
	 * 获取出发城市名称通过id
	 * @param  int $id 城市id
	 * @return String    城市名称
	 * @author chuhang 
	 */
	static public function getStartCityNameById($id) {
		$StartCityModel = StartCityModel::get($id);
		$StartCityName = $StartCityModel->getData('name');

		return $StartCityName;
	}

	/**
	 * 获取目的地城市名称通过id
	 * @param  int $id 目的地城市id
	 * @return String     目的地城市姓名
	 * @author chuhang 
	 */
	static public function getDestinationCityNameById($id) {
		$DestinationCityModel = DestinationCityModel::get($id);
		$DestinationCityName = $DestinationCityModel->getData('name');

		return $DestinationCityName;
	}
}