<?php

use yii\helpers\Html;
use yii2lab\helpers\ModuleHelper;

/* @var $this yii\web\View */

$identity = Yii::$app->user->identity;

?>

<!-- Menu Toggle Button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">

    <?php if(!empty($identity->profile)) { ?>
        <!-- The user image in the navbar-->
        <img src="<?= $identity->profile->avatar_url ?>" class="user-image" alt="User Image" />
    <?php } ?>
    
	<!-- hidden-xs hides the username on small devices so only the image appears. -->
	<small class="hidden-xs"><?= $identity->username ?></small>
</a>

<ul class="dropdown-menu">

	<!-- The user image in the menu -->
	<li class="user-header">
        <?php if(!empty($identity->profile)) { ?>
            <img src="<?= $identity->profile->avatar_url ?>" class="img-circle" alt="User Image" />
        <?php } ?>
		<p>
			<?= $identity->username ?>
		</p>
		<p>
			Web Developer
		</p>
	</li>
	
	<!-- Menu Footer-->
	<li class="user-footer">

		<div class="pull-left">
			<?php if(ModuleHelper::has('profile', FRONTEND)) {
				echo Html::a(t('profile/profile', 'title'),env('url.frontend') . 'profile/person',['class'=>"btn btn-default btn-flat"]);
			} ?>
		</div>
		<div class="pull-right">
			<?= Html::a(t('account/auth', 'logout_action'),['/user/auth/logout'],['class'=>"btn btn-default btn-flat", 'data-method'=>'post']); ?>
		</div>
	</li>
</ul>
