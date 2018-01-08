<?php

namespace yii2lab\misc\helpers;

use yii\web\ServerErrorHttpException;
use yii2lab\helpers\Helper;
use yii2lab\misc\interfaces\CommandInterface;
use yii2mod\helpers\ArrayHelper;

class CommandHelper {
	
	/**
	 * @param      $config
	 *
	 * @return mixed
	 * @throws ServerErrorHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function run($config) {
		$object = self::create($config);
		$result = $object->run();
		return [
			'object' => $object,
			'config' => $config,
			'result' => $result,
		];
	}
	
	/**
	 * @param array $configList
	 *
	 * @return array
	 * @throws ServerErrorHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function runAll(array $configList) {
		if(empty($configList)) {
			return [];
		}
		$result = [];
		$configList = ArrayHelper::toArray($configList);
		foreach($configList as $config) {
			$result[] = self::run($config);
		}
		return $result;
	}
	
	/**
	 * @param      $config
	 *
	 * @return CommandInterface
	 * @throws ServerErrorHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function create($config) {
		/** @var CommandInterface $object */
		$object = Helper::createObject($config, [], CommandInterface::class);
		return $object;
	}
	
}
