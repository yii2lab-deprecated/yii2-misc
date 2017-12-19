<?php

namespace yii2lab\misc\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\ServerErrorHttpException;
use yii2lab\misc\interfaces\FilterInterface;

class FilterHelper {
	
	public static function run($data, $filters) {
		if(empty($filters)) {
			return $data;
		}
		$filters = ArrayHelper::toArray($filters);
		foreach($filters as $config) {
			$filterInstance = self::create($config);
			$data = $filterInstance->run($data);
		}
		return $data;
	}
	
	public static function create($config, $class = null) {
		if(!empty($class)) {
			$config['class'] = $class;
		}
		return self::createFilter($config);
	}
	
	private static function createFilter($config) {
		$filter = Yii::createObject($config);
		if($filter instanceof FilterInterface) {
			return $filter;
		} else {
			throw new ServerErrorHttpException('Filter not be instance of "FilterInterface"');
		}
	}
}
