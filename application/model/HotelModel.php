<?php
namespace app\model;

/**
 * 酒店管理
 */
class HotelModel extends ModelModel
{

	/**
	 * 判断该酒店是否为某路线的入住酒店
	 * @param  int  $id 酒店id
	 * @return boolean     ture为可删除，反之
	 * @author chuhang 
	 */
	static public function isXXXRouteCheckInHotel($id) {
		$RouteModels = RouteModel::all();

		foreach ($RouteModels as $RouteModel) {
			if ($RouteModel->is_delete === 0) {
				if ($RouteModel->hotel_id === $id) {
					return false;
				}
			}
		}

		return true;
	}
}
