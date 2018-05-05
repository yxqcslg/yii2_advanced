<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = 'Reset Password';
$this->params['breadcrumbs'][] = ['label' => 'Reset Password', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-resetpwd">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="adminuser-form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

        <div class="form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

		<?php ActiveForm::end(); ?>

    </div>

</div>
