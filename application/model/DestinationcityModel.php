<?php
namespace app\model;
use think\Model;
/**
 * 目的城市
 */
class DestinationcityModel extends Model
{
	/**
	 * 根据目的国家ID 取出 对应的目的城市ID
	 * @param  int $id 目的国家ID
	 * @author huangshuaibin
	 * @return array     目的城市ID的数组
	 */
	public static function getDestinationIdByCountryId($id)
	{
		//查询条件
		$map = array('country_id' => $id);

		$Destinationcity = new DestinationcityModel;
		$destinations = $Destinationcity->where($map)->select();

		//临时数组
		$temp = [];

		//取出目的
		foreach ($destinations as $key => $value) {
			array_push($temp, $value->id);
		}

		return $temp;
	}
}