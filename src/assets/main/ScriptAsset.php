<?php

namespace yii2lab\misc\assets\main;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class ScriptAsset extends AssetBundle
{
	public $sourcePath = '@yii2lab/misc/assets/main/dist';
	public $js = [
		'js/function.js',
		'js/scripts.js',
	];
	public $depends = [
		'yii\web\JqueryAsset',
	];
	
	function init() {
		parent::init();
		$jsCode = $this->generateConfigToJs();
		Yii::$app->view->registerJs($jsCode, View::POS_HEAD);
	}
	
	private function generateConfigToJs() {
		$env = env(null);
		$config['env'] = [
			'mode' => $env['mode'],
			'url' => $env['url'],
		];
		$code = 'app = ' . json_encode($config) . ';';
		return $code;
	}
}
