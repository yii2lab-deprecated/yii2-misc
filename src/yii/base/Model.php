<?php

namespace yii2lab\misc\yii\base;

use Yii;
use yii\base\Model as YiiModel;
use yii\db\BaseActiveRecord;

/**
 * Class Model
 * @package yii2lab\misc\yii\base
 * 
 * @deprecated use \yii2lab\domain\base\Model
 */
class Model extends YiiModel
{

	const SCENARIO_CREATE = 'create';
	const SCENARIO_UPDATE = 'update';

	/** @var BaseActiveRecord $modelInstance */
	protected $modelInstance;

	public function modelClass()
	{
		return null;
	}

	public function getRules($rules = [])
	{
		$modelClass = $this->modelClass();
		$modelRules = [];
		if($modelClass) {
			/** @var BaseActiveRecord $modelInstance */
			$modelInstance = new $modelClass();
			$modelRules = $modelInstance->rules();
		}
		return array_merge($modelRules, $rules);
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		$modelClass = $this->modelClass();
		if($modelClass) {
			return $this->getModelAttr('attributeLabels', $modelClass);
		}
		return [];
	}

	/**
	 * Return first error of model
	 * @return string
	 */
	public function getFirstErrorModel()
	{
		foreach ($this->getFirstErrors() as $attribute => $error) {
			return $error;
		}
		return null;
	}

	protected function saveModel()
	{
		$saveResult = $this->modelInstance->save();
		if($this->modelInstance->hasErrors() || !$saveResult) {
			$this->addErrors($this->modelInstance->getErrors());
		}
		return $saveResult ? $this->modelInstance : null;
	}

	/**
	 * load model instance.
	 *
	 * @param integer|null $id
	 *
	 * @return BaseActiveRecord|null the saved model or null if saving fails
	 */
	protected function loadModel($id = null)
	{
		/** @var BaseActiveRecord $modelClass */
		$modelClass = $this->modelClass();
		if($id) {
			$this->modelInstance = $modelClass::findOne($id);
		} else {
			$this->modelInstance = new $modelClass();
		}
		$this->modelInstance->load($this->attributes, '');
		return $this->modelInstance;
	}

	protected function getModelAttr($method, $modelClass = null, $attrs = [])
	{
		if(empty($modelClass)) {
			$modelClass = $this->modelClass();
		}
		$modelRules = (new $modelClass)->{$method}();
		return array_merge($modelRules, $attrs);
	}
}
