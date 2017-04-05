<?php
namespace app\model;
use think\Model;

/**
* 基础Model 继承think\Model
*/
class ModelModel extends Model
{
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
