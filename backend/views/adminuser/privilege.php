<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = 'Privilege'+$id;
$this->params['breadcrumbs'][] = ['label' => 'Adminusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $id, 'url' => ['view', 'id' => $id]];
$this->params['breadcrumbs'][] = 'Setting';
?>
<div class="privilege-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="adminuser-privilege-form">

		<?php $form = ActiveForm::begin(); ?>
		<?= Html::checkboxList('newPri', $authAssignmentsArray, $allPrivilegesArray)?>

		<div class="form-group">
			<?= Html::submitButton('Setting', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>

</div>
