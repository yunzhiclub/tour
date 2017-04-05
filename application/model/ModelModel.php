<?php
namespace app\model;
use think\Model;

/**
* 基础Model 继承think\Model
*/
class ModelModel extends Model
{
    /**
     * 重写 查找单条记录
     * 当返回值为null时，强制返回当前调用对象
     * @param null $data
     * @param array $with
     * @param bool $cache
     * @return object
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
