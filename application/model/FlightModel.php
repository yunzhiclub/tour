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

}