<?php
namespace app\model;
use app\model\DestinationCityModel;	//目的城市
use app\model\DestinationCityRouteHotelViewModel; //与路线有关信息组成的视图
/**
 * 路线
 */
class RouteModel extends ModelModel
{
	private $StartCityModel = null;		//对应的出发城市模型
	private $DestinationCityModel = null;	 //对应的目的地城市模型
	private $HotelModel = null;     	//对应的酒店模型
	private $FlightModel = null;  		//对应的航班的模型

	/**
	 * 当前模型与出发城市关系为n:1
	 * @return lists StartCityModels
	 * @author chuhang 
	 */
	public function StartCityModel() {

		if (null === $this->StartCityModel) {
			$this->StartCityModel = StartCityModel::get($this->getData('start_city_id'));
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
			$this->DestinationCityModel = DestinationCityModel::get($this->getData('destination_city_id'));
		}

		return $this->DestinationCityModel;
	}

	/**
	 * 当前模型与酒店关系为n:1
	 * @return lists HotelModels
	 * @author chuhang 
	 */
	public function HotelModel() {

		if (null === $this->HotelModel) {
			$this->HotelModel = HotelModel::get($this->getData('hotel_id'));
		}

		return $this->HotelModel;
	}

	/**
	 * 当前模型与航班关系为n:1
	 * @return lists FlightModels
	 * @author chuhang 
	 */
	public function FlightModel() {

		if (null === $this->FlightModel) {
			$this->FlightModel = FlightModel::get($this->getData('hotel_id'));
		}

		return $this->FlightModel;
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
	 * @author huangshuaibin 
	 * @return array           array中的每一项都是一个对象，路线的详细信息
	 */
	public static function getRoutesDetails($routeIds)
	{
		
		$DestinationCityRouteHotelViewModel = new DestinationCityRouteHotelViewModel;

		//从视图中取出相应的信息
		$RouteDetails = $DestinationCityRouteHotelViewModel->where('id', 'in', $routeIds)->select();

		//用来存放全部数据的数组
		$RouteAndFlight = [];
		for ($i=0; $i < sizeof($RouteDetails); $i++) { 
			//每轮之后将数组置空
			$temp = [];

			//取出该路线的出发航班，并放入临时数组中
			$temp['BeginFlight'] = FlightModel::get($RouteDetails[$i]->data['route_begin_flight_id']);

			//取出该路线的返回航班，并放入临时数组中
			$temp['BackFlight'] = FlightModel::get($RouteDetails[$i]->data['route_back_flight_id']);

			//路线的主要数据
			$temp['route'] =  $RouteDetails[$i];

			//每次把新的temp push进数据的数组
			array_push($RouteAndFlight, $temp);
		}
		
		return $RouteAndFlight;
	}
	/**
	 * 获取该路线的评价数量
	 * @return int 该路线评价的数量
	 * @author chuhang 
	 */
	public function  getRouteEvaluateCount() 
	{
		$EvaluateModel = new EvaluateModel;
		$map['route_id'] = $this->id;
		$EvaluateModels = $EvaluateModel->where($map)->select();

		return count($EvaluateModels);
	}


	static public function getBasicInfo()
	{
		$map = [];
		$map['is_delete'] = 0;
		//获取出发成市信息
		$StartCityModel = new StartCityModel;
		$result['StartCityModels'] = $StartCityModel->where($map)->select();
		//获取目的地城市信息
		$DestinationCityModel = new DestinationCityModel;
		$result['DestinationCityModels'] = $DestinationCityModel->where($map)->select();
		//获取酒店信息
		$HotelModel = new HotelModel;
		$result['HotelModels'] = $HotelModel->where($map)->select();
		//获取航班信息
		$FlightModel = new FlightModel;
		$result['FlightModels'] = $FlightModel->where($map)->select();

		return $result;
	}

}
