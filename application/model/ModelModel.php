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
}
