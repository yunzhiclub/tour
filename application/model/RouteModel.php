<?php
namespace app\model;
use app\model\DestinationCityModel;	//目的城市
use app\model\DestinationCityRouteHotelViewModel; //与路线有关信息组成的视图
use think\Db;
/**
 * 路线
 */
class RouteModel extends ModelModel
{
	private $StartCityModel = null;		//对应的出发城市模型
	private $DestinationCityModel = null;	 //对应的目的地城市模型
	private $HotelModel = null;     	//对应的酒店模型
	private $BackFlightModel = null;  		//对应的返回航班的模型
	private $BeginFlightModel = null;  		//对应的出发航班的模型
	private $HomeRecommendModel = null;  		//对应的出发航班的模型
	private $ChosenModel = null;  		//对应的出发航班的模型

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
	 * 获取路线返回航班模型
	 * @author chuhang
	 */
	public function BackFlightModel() {

		if (null === $this->BackFlightModel) {
			$this->BackFlightModel = FlightModel::get($this->getData('back_flight_id'));
		}

		return $this->BackFlightModel;
	}

	/**
	 * 获取路线出发航班模型
	 * @author chuhang 
	 */
	public function BeginFlightModel() {

		if (null === $this->BeginFlightModel) {
			$this->BeginFlightModel = FlightModel::get($this->getData('begin_flight_id'));
		}

		return $this->BeginFlightModel;
	}

	/**
	 * 路线与首页推荐模型
	 * @author chuhang 
	 */
	public function HomeRecommendModel() {
		if (null === $this->HomeRecommendModel) {
			$map['route_id'] = $this->getData('id');
			$map['is_delete'] = 0;
			$this->HomeRecommendModel = HomeRecommendModel::get($map);
		}

		return $this->HomeRecommendModel;
	}

	/**
	 * 获取路线与精选模型
	 * @author chuhang 
	 */
	public function ChosenModel() {
		if (null === $this->ChosenModel) {
			$map['route_id'] = $this->getData('id');
			$map['is_delete'] = 0;
			$this->ChosenModel = ChosenModel::get($map);
		}

		return $this->ChosenModel;
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
		unset($EvaluateModel);

		return count($EvaluateModels);
	}

	/**
	 * 获取路线的出发成市、目的地城市、酒店、航班、的基本信息	
	 * @return [array] 
	 * @author chuhang 
	 */
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

		unset($FlightModel);
		unset($HotelModel);
		unset($DestinationCityModel);
		unset($StartCityModel);

		return $result;
	}

	static public function saveRouteInfo($data)
	{
		//将数组进行拆分，一部分存入路线表中，一部分存入出发时间表中，一部分存入首页推荐表和精选表中
		$weightRelation = array_splice($data, 18, 5);
		$data['content'] = array_pop($weightRelation);
		$startTime = array_splice($data, 10, 2);
		//将数据存入路线表中
		$RouteModel = new RouteModel;
		$RouteModel->save($data);
		//将路线的出发日期及对应的价钱存入出发时间表中
		self::saveStartTimeInfo($startTime, $RouteModel->getData('id'));
		//将路线的首页推荐存入首页推荐表中
		if ($weightRelation['isHomeRecommend'] === '0') {
			$HomeRecommendModel = new HomeRecommendModel;
			$HomeRecommendModel->route_id = $RouteModel->getData('id');
			$HomeRecommendModel->weight = $weightRelation['homeRecommendWeight'];
			$HomeRecommendModel->save();
		}
		//将路线的精选存入精选表中
		if ($weightRelation['isChosen'] === '0') {
			$ChosenModel = new ChosenModel;
			$ChosenModel->route_id = $RouteModel->getData('id');
			$ChosenModel->weight = $weightRelation['chosenWeight'];
			$ChosenModel->save();
		}

		unset($HomeRecommendModel);
		unset($ChosenModel);

		return $RouteModel;
	}

	/**
	 * 将路线的出发次数及每次的价格存入StartTimeModel
	 * @param  array $data    时间和价钱
	 * @param  int $routeId 路线id
	 * @author chuhang
	 */
	static public function saveStartTimeInfo($data, $routeId) {
		//根据出发的次数，分别存库
		for ($i = 0; $i < count($data['date']); $i++) {
			$StartTimeModel = new StartTimeModel;
			$StartTimeModel->route_id = $routeId;
			$StartTimeModel->price = $data['price'][$i];
			$StartTimeModel->date = $data['date'][$i];
			$StartTimeModel->save();
		}

		unset($StartTimeModel);

	}

	/**
	 * 根据用户的筛选条件查询信息
	 * @param  array $data [用户的查询条件]
	 * @return [object]       [路线信息]
	 * @author chuhang 
	 */
	public function getSearchInfo($data) {
        $map['is_delete'] = 0;

		if (isset($data['start_city_id']) && $data['start_city_id'] !== '0') {
			$map['start_city_id'] = $data['start_city_id'];
		}
		if (isset($data['destination_city_id']) && $data['destination_city_id'] !== '0') {
			$map['destination_city_id'] = $data['destination_city_id'];
		}
		if (isset($data['name'])) {
			$this->where($map)->where('name', 'like', '%' . $data['name'] . '%');
		} else {
			$this->where($map);
		}
		unset($map);
		return $this;
	}

	/**
	 * 获取其他信息，首页推荐权重、精选权重、路程天数及价格
	 * @param  int $id 路线id
	 * @return array     
	 * @author chuhang 
	 */
	static public function getOtherInfo($id)
	{
		//定义查询条件 
		$map = [];
		$map['route_id'] = $id;
		$map['is_delete'] = 0;
		//判断精选表中是否有该条路线信息，如果有取出权重
		$ChosenModel = ChosenModel::get($map);

		if (!empty($ChosenModel->getData())) {
			$result['isChosen'] = 0;
			$result['chosenWeight'] = $ChosenModel->getData('weight');
		} else {
			$result['isChosen'] = 1;
		}
		//同上
		$HomeRecommendModel = HomeRecommendModel::get($map);
		if (!empty($HomeRecommendModel->getData())) {
			$result['isHomeRecommend'] = 0;
			$result['homeRecommendWeight'] = $HomeRecommendModel->getData('weight');
		} else {
			$result['isHomeRecommend'] = 1;
		}
		//获取该路线的出发时间及价格
		$StartTimeModel = new StartTimeModel;
		$StartTimeModels = $StartTimeModel->where($map)->select();
		$result['start_time'] = $StartTimeModels;
		unset($StartTimeModel);
		unset($StartTimeModels);
		unset($HomeRecommendModel);
		unset($ChosenModel);

		return $result;
	}

	/**
	 * 删除路线表及出发时间表、精选表、首页推荐表中的路线信息
	 * @param  int $id 路线id
	 * @author chuhang 
	 */
	static public function deleteRouteInfo($id)
	{
		$map = [];
		$map['is_delete'] = 0;
		$map['route_id'] = $id;
		//删除路线表中的信息
		$RouteModel = RouteModel::get($id);
		$RouteModel->is_delete = 1;
		$RouteModel->save();
		//删除出发时间表的路线信息
		$StartTimeModel = new StartTimeModel;
		$StartTimeModels = $StartTimeModel->where($map)->select();
		if (!empty($StartTimeModels)) {
			foreach ($StartTimeModels as $StartTimeModel) {
			$StartTimeModel->is_delete = 1;
			$StartTimeModel->save();
			}
		}
		
		//删除首页推荐表中的路线信息
		$HomeRecommendModel = HomeRecommendModel::get($map);
		if (!empty($HomeRecommendModel->getData())) {
			$HomeRecommendModel->is_delete = 1;
			$HomeRecommendModel->save();
		}
		
		//删除精选表中的路线信息
		$ChosenModel = ChosenModel::get($map);
		if (!empty($ChosenModel->getData())) {
			$ChosenModel->is_delete = 1;
			$ChosenModel->save();
		}
		
		unset($map);
		unset($RouteModel);
		unset($StartTimeModels);
		unset($StartTimeModel);
		unset($HomeRecommendModel);
		unset($ChosenModel);
	}


	/**
	 * 对money过滤，因为具有strfmon 的系统才有 money_format() 函数。 例如 Windows 不具备，所以 Windows 系统上 money_format() 未定义。用引此方法对money过滤
	 * @param  int  $val    价钱
	 * @param  string  $symbol money类型
	 * @param  integer $r      保留位数
	 * @return string          过滤后的价钱，如：￥897,897
	 * @author chuhang 
	 */
	static public function money_format($val,$symbol='￥',$r=0)
	{
	    $n = $val; 
	    $c = is_float($n) ? 1 : number_format($n,$r);
	    $d = '.';
	    $t = ',';
	    $sign = ($n < 0) ? '-' : '';
	    $i = $n=number_format(abs($n),$r); 
	    $j = (($j = strlen($i)) > 2) ? $j % 2 : 0; 

	   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;
	}

	/**
	 * 更新路线信息
	 * @param  array $data post的信息
	 * @param  int $id   路线id
	 * @author chuhang 
	 */
	static public function updateRouteInfo($data, $id)
	{
		//将数组进行拆分，一部分存入路线表中，一部分存入出发时间表中，一部分存入首页推荐表和精选表中
		$weightRelation = array_splice($data, 18, 5);
		$data['content'] = array_pop($weightRelation);
		$startTime = array_splice($data, 10, 2);
		//将数据存入路线表中
		$RouteModel = new RouteModel;
		$RouteModel->save($data);
		//将路线的id修改为原路线的id
		Db::table('yunzhi_route')->where('id', $RouteModel->id)->update(['id' => $id]);
		$RouteModel = RouteModel::get($id);
		//将路线的出发日期及对应的价钱存入出发时间表中
		self::saveStartTimeInfo($startTime, $RouteModel->getData('id'));
		//将路线的首页推荐存入首页推荐表中
		if ($weightRelation['isHomeRecommend'] === '0') {
			$HomeRecommendModel = new HomeRecommendModel;
			$HomeRecommendModel->route_id = $RouteModel->getData('id');
			$HomeRecommendModel->weight = $weightRelation['homeRecommendWeight'];
			$HomeRecommendModel->save();
		}
		//将路线的精选存入精选表中
		if ($weightRelation['isChosen'] === '0') {
			$ChosenModel = new ChosenModel;
			$ChosenModel->route_id = $RouteModel->getData('id');
			$ChosenModel->weight = $weightRelation['chosenWeight'];
			$ChosenModel->save();
		}

		unset($HomeRecommendModel);
		unset($ChosenModel);
		return $RouteModel;

	}

	/**
	 * 判断精选权重是否显示
	 * @return int 0为显示，反之
	 * @author chuhang 
	 */
	public function isShowChosenWeight()
	{
		if (!empty($this->ChosenModel()->getData())) {
            $result = 0;
        } else {
            $result = 1;
        }

        return $result;
	}

	/**
	 * 判断首页推荐权重是否显示
	 * @return int 0为显示，反之
	 * @author chuhang 
	 */
	public function isShowHomeRecommendWeight()
	{
		if (!empty($this->HomeRecommendModel()->getData())) {
            $result = 0;
        } else {
            $result = 1;
        }

        return $result;
	}
}
