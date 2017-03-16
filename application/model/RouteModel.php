<?php
namespace app\model;
use app\model\DestinationCityRouteHotelFlightViewModel; //与路线有关信息组成的视图
/**
 * 路线
 */
class RouteModel extends ModelModel
{
	private $StartCityModel = null;
	private $DestinationCityModel = null;
	private $HotelModel = null;
	private $BegionFlightModel = null;
	private $BackFlightModel = null;

	/**
	 * 获取出发城市Model对象
	 * @author huangshuaibin 
	 * @return object 出发城市的对象
	 */
	public function getStartCityModel()
	{
		if (null === $this->StartCityModel) {
			$StartCityModelId = $this->getData('start_city_id');
			$this->StartCityModel = StartCityModel::get($StartCityModelId);
		}

		return $this->StartCityModel;
	}
	/**
	 * 获取目的城市对象Model
	 * @return object 目的城市对象
	 */
	public function getDestinationCityModel()
	{
		if (null === $this->DestinationCityModel) {
			$DestinationCityModelId = $this->getData('destination_city_id');
			$this->DestinationCityModel = DestinationCityModel::get($DestinationCityModelId);
		}

		return $this->DestinationCityModel;
	}

	/**
	 * 通过RouteModel的外键获取HotelModel的对象
	 * @return Obejct HotelModel对象的Model
	 */
	public function getHotelModel()
	{
		if (null === $this->HotelModel) {
			$HotelModelId = $this->getData('hotel_id');
			$this->HotelModel = HotelModel::get($HotelModelId);
		}

		return $this->HotelModel;
	}

	/**
	 * 获取外键对应开始航班的Model对象
	 * @author huangshuaibin 
	 * @return Object 出发航班的Model
	 */
	public function getBegionFlightModel()
	{
		if (null === $this->BegionFlightModel) {

			$BeginFlightModelId = $this->getData('begin_flight_id');

			$this->BeginFlightModel = FlightModel::get($BeginFlightModelId);
		}

		return $this->BeginFlightModel;
	}

	/**
	 * 通过外键获取出返回航班的对象
	 * @author huangshuaibin	
	 * @return Object 返回航班的对象
	 */
	public function getBackFlightModel()
	{
		if (null === $this->BackFlightModel) {
			$BackFlightModelId = $this->getData('back_flight_id');
			$this->BackFlightModel = FlightModel::get($BackFlightModelId);
		}

		return $this->BackFlightModel;
	}
	/**
	 * 获取路线ID By 目的地ID
	 * @param  array $id 路线的ID
	 * @author huangshuaibin
	 * @return array     返回路线对应的数组
	 */
	public static function getRouteIdByDestinationId($id)
	{
		$RouteModel = new RouteModel;

		//通过ID进行查询
		$routes = $RouteModel->where('destination_city_id','in',$id)->select();

		//临时数组
		$temp = [];

		//将路线的ID存入临时数组
		foreach ($routes as $key => $value) {
			array_push($temp, $value->id);
		}
		return $temp;
	}

	/**
	 * 通过出发城市ID 获取 路线ID
	 * @param  array $id 出发城市id
	 * @author huangshuaibin
	 * @return array     返回路线ID 数组
	 */
	public static function getRouteIdByStartCityId($startId)
	{
		$RouteModel = new RouteModel;

		//通过id查询取出对应路线
		$routes = $RouteModel->where('start_city_id', '=', $startId)->select();

		//将路线数组中的id  打包成一个新的数组
		//临时数组
		$temp = [];

		//将路线的ID存入临时数组
		foreach ($routes as $key => $value) {
			array_push($temp, $value->id);
		}
		return $temp;
	}

	/**
	 * 通过路线id取出路线的详情
	 * @param  int $id 路线的id
	 * @author huangshuaibin 
	 * @return array     返回的路线的详情
	 */
	public static function getRouteById($id)
	{
		$RouteModel = new RouteModel;
		$route = $RouteModel->get($id);
		return $route;
	}
	/**
	 * 通过路线Id的数组取出多有对应的数据
	 * @param  array $Ids id构成的数组
	 * @author huangshuaibin
	 * @return array      路线信息构成的数组
	 */
	public static function getRoutesByIds($Ids)
	{
		$RouteModel = new RouteModel;

		//通过查询条件的数组取出所有的路线的详情数组
		$routes = $RouteModel->where('id', 'in', $Ids)->select();
		return $routes;
	}
	/**
	 * 通过路线ID 和 目的国家ID 取出所有满足条件的路线
	 * @param  int $startId   出发城市id
	 * @param  int $countryId 目的城市id
	 * @author huangshuaibin
	 * @return array            满足条件的路线的数组
	 */
	public static function getRouteIdsByCountryIdAndStartCityId($startId,$countryId)
	{
		//通过出发城市取出所有的路线
		$routes1 = RouteModel::getRouteIdByStartCityId($startId);

		//通过目的国家取出其对应的所有目的城市
		$destinationcitys = DestinationCityModel::getDestinationIdByCountryId($countryId);

		//通过目的城市的id取出所有的路线的id
		$routes2 = RouteModel::getRouteIdByDestinationId($destinationcitys);

		//将所有两次取出的id进行比较,将相同的路线放入一个新的数组
		$temp = [];	//临时数组

		foreach ($routes1 as $key1 => $value1) {
			foreach ($routes2 as $key2 => $value2) {
				if ($value1 === $value2) {
					array_push($temp, $value2);
				}
			}
		}

		//返回数据
		return $temp;
	}

	/**
	 * 获取路线的详情信息，从视图中查询数据
	 * @param  array or int $routeIds 一个路线id构成的数组或者单个的id
	 * @return array           array中的每一项都是一个对象，路线的详细信息
	 */
	public static function getRoutesDetails($routeIds)
	{
		
		$DestinationCityRouteHotelFlightViewModel = new DestinationCityRouteHotelFlightViewModel;
		$RouteDetails = $DestinationCityRouteHotelFlightViewModel->where('id', 'in', $routeIds)->select();
		
		return $RouteDetails;
	}
}
