<?php
namespace app\model;

/**
 * 出发城市
 * @author huangshuaibin 
 */
class StartCityModel extends ModelModel
{
	/**
	 * 判断该出发城市是否为某航班的出发城市
	 * @return boolean 
	 * @author chuhang 
	 */
	public function isXXXFlightStartCity() {
		$FlightModels = FlightModel::all();

		foreach ($FlightModels as $FlightModel) {
			if ($FlightModel->up_city_id === $this->getData('id')) {
				return false;
			}
		}

		return true;
	}

	/**
	 * 判断该出发城市是否为某路线出发城市
	 * @return boolean 
	 * @author chuhang 
	 */
	public function isXXXRouteStartCity() {
		$RouteModels = RouteModel::all();

		foreach ($RouteModels as $RouteModel) {
			if ($RouteModel->start_city_id === $this->getData('id')) {
				return false;
			}
		}

		return true;
	}
}
