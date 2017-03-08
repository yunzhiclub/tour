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
		$data = [];
		$bigData = [];
		for ($i = 1; $i <= count($countrys); $i++) {
			array_push($data, $countrys[$i-1]);
			if ($i % 3 === 0) {
				array_push($bigData, $data);
				$data = [];
			}
		}
		if (count($countrys) % 3 !== 0) {
			array_push($bigData, $data);
		}
		
		return $countrys;
	}
}