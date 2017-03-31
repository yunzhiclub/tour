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
	 * 截取时间长度，去除不必要的显示，如02:44:00,截取后02:44
	 * @param  [String] $time [所要截取的时间]
	 * @return [string]       [截取后的时间]
	 */
	static public function substrTime($time) {
		$result = substr($time, 0, -3);
		return $result;
	}
}
