<?php

namespace yii2lab\misc\helpers;

use Yii;
use yii\web\ServerErrorHttpException;
use yii2lab\misc\interfaces\CommandInterface;

class CommandHelper {
	
	public static function run($config, $class = null) {
		if(!empty($class)) {
			$config['class'] = $class;
		}
		$generator = Yii::createObject($config);
		if($generator instanceof CommandInterface) {
			return $generator->run();
		} else {
			throw new ServerErrorHttpException('Command not be instance of "CommandInterface"');
		}
	}

}
