<?php
namespace app\model;
use think\Model;
/**
 * 国家
 */
class CountryModel extends Model
{
	/**
	 * 通过地区id  获取  该地区全部国家信息
	 * @param  int $regionId 地区id
	 * @author huangshuaibin
	 * @return array           全部国家信息
	 */
	public static function getCountrysByRegionId($regionId)
	{
		//查询条件
	   	$map = array('region_id' => $regionId);

	   	//根据地区id查询
	   	$Country = new CountryModel;
		$countrys = $Country->where($map)->select();

		//临时数组,用于放置3个数据对象
		$data = [];

		//将临时的数组对象,拼接到一个大的数组中
		$bigData = [];

		//遍历数组,终止条件是数组的长度向上取整
		for ($i = 1; $i <= count($countrys); $i++) {
			array_push($data, $countrys[$i-1]);

			//每三个数据为一组,存入大数组中
			if ($i % 3 === 0) {
				array_push($bigData, $data);
				$data = [];
			}
		}

		//数组的长度除以3之后的余数,江他们放入大数组中
		if (count($countrys) % 3 !== 0) {
			array_push($bigData, $data);
		}
		
		return $countrys;
	}
}