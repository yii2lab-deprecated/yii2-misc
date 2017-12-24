<?php

namespace yii2lab\misc\helpers;

use Yii;
use yii\base\InvalidConfigException;
use yii\web\ServerErrorHttpException;
use yii2lab\helpers\Helper;
use yii2lab\misc\interfaces\CommandInterface;

class CommandHelper {
	
	/**
	 * @param      $config
	 * @param null $class
	 *
	 * @return mixed
	 * @throws ServerErrorHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function run($config, $class = null) {
		$command = self::create($config, $class);
		return $command->run();
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
		foreach($configList as $config) {
			$result[] = self::run($config);
		}
		return $result;
	}
	
	/**
	 * @param      $config
	 * @param null $class
	 *
	 * @return CommandInterface
	 * @throws ServerErrorHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function create($config, $class = null) {
		$config = Helper::normalizeComponentConfig($config, $class);
		return self::createCommand($config);
	}
	
	/**
	 * @param $config
	 *
	 * @return CommandInterface
	 * @throws ServerErrorHttpException
	 * @throws InvalidConfigException
	 */
	private static function createCommand($config) {
		if(empty($config)) {
			throw new InvalidConfigException('Empty command config');
		}
		$command = Yii::createObject($config);
		if($command instanceof CommandInterface) {
			return $command;
		} else {
			throw new ServerErrorHttpException('Command not be instance of "CommandInterface"');
		}
	}

}
