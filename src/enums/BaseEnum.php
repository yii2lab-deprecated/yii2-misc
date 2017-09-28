<?php

namespace yii2lab\misc\enums;

use yii2lab\domain\helpers\ReflectionHelper;

class BaseEnum {
	
	public static function values($prefix = null) {
		$constants = static::all($prefix);
		$constants = array_values($constants);
		$constants = array_unique($constants);
		return $constants;
	}
	
	public static function keys($prefix = null) {
		$constants = static::all($prefix);
		$constants = array_keys($constants);
		return $constants;
	}
	
	public static function all($prefix = null) {
		$className = get_called_class();
		if(!empty($prefix)) {
			$constants = ReflectionHelper::getConstantsByPrefix($className, $prefix);
		} else {
			$constants = ReflectionHelper::getConstants($className);
		}
		return $constants;
	}
	
	public static function isValid($value, $prefix = null) {
		return in_array($value, static::values($prefix));
	}
	
}
