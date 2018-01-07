<?php

namespace yii2lab\misc\assets;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class MainAsset extends AssetBundle
{
	public $sourcePath = '@yii2lab/misc/assets/main';
	public $js = [
		'js/function.js',
		'js/scripts.js',
	];
	public $css = [
		'css/main.css',
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
			'YII_DEBUG' => $env['YII_DEBUG'],
			'YII_ENV' => $env['YII_ENV'],
			'url' => $env['url'],
		];
		$code = 'app = ' . json_encode($config) . ';';
		return $code;
	}
}
