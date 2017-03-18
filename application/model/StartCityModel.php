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

		//遍历航班数组
		foreach ($FlightModels as $FlightModel) {
			//判断航班是否已删除
			if ($FlightModel->is_delete === 0) {

				if ($FlightModel->up_city_id === $this->getData('id')) {
					return false;
				}
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

		//遍历路线数组
		foreach ($RouteModels as $RouteModel) {
			//判断乳腺是否已删除
			if ($RouteModel->is_delete === 0) {

				if ($RouteModel->start_city_id === $this->getData('id')) {
				return false;
				}
			}
			
		}

		return true;
	}
}
