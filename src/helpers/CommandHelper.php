<?php

namespace yii2lab\misc\helpers;

use Yii;
use yii\web\ServerErrorHttpException;
use yii2lab\misc\interfaces\CommandInterface;

class CommandHelper {
	
	public static function run($config, $class = null) {
		$command = self::create($config, $class);
		return $command->run();
	}
	
	public static function create($config, $class = null) {
		if(!empty($class)) {
			$config['class'] = $class;
		}
		return self::createCommand($config);
	}
	
	private static function createCommand($config) {
		$command = Yii::createObject($config);
		if($command instanceof CommandInterface) {
			return $command;
		} else {
			throw new ServerErrorHttpException('Command not be instance of "CommandInterface"');
		}
	}

}
