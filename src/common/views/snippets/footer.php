<?php

use yii2lab\helpers\MenuHelper;
use yii2lab\helpers\ModuleHelper;
use yii2module\article\widgets\PostList;
use yii2module\lang\widgets\LangSelector;

$menu = include(COMMON_DATA_DIR . DS . 'menu' . DS . 'footer.php');
$items = MenuHelper::gen($menu['leftMenu']);

?>

<div class="pull-left">
	<p>
	    &copy; <?= Yii::$app->name . SPC . date('Y') ?>
        <?= MenuHelper::renderMenu($items) ?>
	</p>

	<?php if(APP == FRONTEND) { ?>

		<?php if(ModuleHelper::has('article')) { ?>
			<p>
		        <?= PostList::widget() ?>
			</p>
		<?php } ?>

	<?php } ?>

</div>

<div class="pull-right">

	<?php if(ModuleHelper::has('lang')) { ?>
		<i class="fa fa-language" title="<?= Yii::t('lang/main', 'title') ?>"></i>
        <span class="dropup">
            <?= LangSelector::widget() ?>
        </span>
	<?php } ?>

	&nbsp;

	<?= Yii::powered() ?>
</div>
