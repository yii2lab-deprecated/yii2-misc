<?php

namespace yii2lab\misc\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\ServerErrorHttpException;
use yii2lab\misc\interfaces\FilterInterface;

class FilterHelper {
	
	/**
	 * @param $config
	 * @param $data
	 *
	 * @return mixed
	 * @throws ServerErrorHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function run($config, $data) {
		$filterInstance = self::create($config);
		$data = $filterInstance->run($data);
		return $data;
	}
	
	/**
	 * @param array $filters
	 * @param       $data
	 *
	 * @return mixed
	 * @throws ServerErrorHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function runAll(array $filters, $data) {
		if(empty($filters)) {
			return $data;
		}
		$filters = ArrayHelper::toArray($filters);
		foreach($filters as $config) {
			$data = self::run($config, $data);
		}
		return $data;
	}
	
	/**
	 * @param      $config
	 * @param null $class
	 *
	 * @return FilterInterface
	 * @throws ServerErrorHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function create($config, $class = null) {
		if(!empty($class)) {
			$config['class'] = $class;
		}
		return self::createFilter($config);
	}
	
	/**
	 * @param $config
	 *
	 * @return FilterInterface
	 * @throws ServerErrorHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	private static function createFilter($config) {
		$filter = Yii::createObject($config);
		if($filter instanceof FilterInterface) {
			return $filter;
		} else {
			throw new ServerErrorHttpException('Filter not be instance of "FilterInterface"');
		}
	}
}
