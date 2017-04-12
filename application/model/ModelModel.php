<?php
namespace app\model;
use think\Model;

/**
* 基础Model 继承think\Model
*/
class ModelModel extends Model
{
	/**
	 * @param null  $data
	 * @param array $with
	 * @param bool  $cache
	 * @return object
	 * @author: mengyunzhi www.mengyunzhi.com
	 * @Date&Time: 2017-04-05 21:16
	 */
    public static function get($data = null, $with = [], $cache = false)
    {
        $query = self::parseQuery($data, $with, $cache);
        $result = $query->find($data);
        if (null === $result){
            $className = get_called_class();
            return new $className;
        }else {
            return $result;
        }
    }

    /**
     * 对money过滤，因为具有strfmon 的系统才有 money_format() 函数。 例如 Windows 不具备，所以 Windows 系统上 money_format() 未定义。故引用此方法对money过滤
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
