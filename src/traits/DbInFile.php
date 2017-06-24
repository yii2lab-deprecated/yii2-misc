<?php

namespace yii2lab\misc\traits;

use Yii;
use yii\db\ActiveRecord as YiiActiveRecord;
use yii2lab\helpers\yii\ArrayHelper as WoopArrayHelper;
use yii\helpers\ArrayHelper;

trait DbInFile {
	
	private static $_data = false;
	public static $fileStorage = true;
	
	public static function findAll($condition)
	{
		$dataList = self::getAllData();
		$all = WoopArrayHelper::findAll($dataList, $condition);
		return self::createModels($all);
	}
	
	public static function findOne($condition)
	{
		$dataList = self::getAllData();
		$row = WoopArrayHelper::findOne($dataList, $condition);
		return self::createModels($row);
	}
	
	public static function primaryKey()
	{
		return ['id'];
	}
	
	public static function getTableSchema()
	{
		$dataList = self::getAllData();
		$firstKey = key($dataList);
		$class = new \stdClass();
		$class->columns = array_keys($dataList[$firstKey]);
		foreach($class->columns as $name) {
			$result[$name] = $name;
		}
		$class->columns = $result;
		return $class;
	}
	
	protected static function getAllData()
	{
		if(self::$_data === false) {
			$table = static::tableName();
			preg_match('/([a-zA-Z_]+)/i', $table, $matches);
			$table = $matches[1];
			$dir = static::$fileStorage === true ? '@common/data' : static::$fileStorage;
			$fileName = Yii::getAlias($dir) . DS . $table . '.php';
			self::$_data = include($fileName);
		}
		return self::$_data;
	}
	
	private static function createModels($data)
	{
		if(empty($data)) {
			return null;
		}
		if(ArrayHelper::isIndexed($data)) {
			foreach ($data as &$row) {
				$row = self::createModel($row);
			}
		} else {
			$data = self::createModel($data);
		}
		return $data;
	}
	
	private static function createModel($row)
	{
		$class = static::className();
		return new $class($row);
	}
	
}