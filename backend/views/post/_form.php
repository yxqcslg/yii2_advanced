<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>
    <?php
    /*
     第一种方法
    $psOjs = \common\models\Poststatus::find()->all();
    $allStatus = \yii\helpers\ArrayHelper::map($psOjs, 'id', 'name');
    */
    /*第二种方法
    $psArr = Yii::$app->db->createCommand('select id,name from poststatus')->queryAll();
    $allStatus = \yii\helpers\ArrayHelper::map($psArr, 'id', 'name');
    */
    /*第三种方法
    $allStatus = (new \yii\db\Query())->select(['name','id'])->from('poststatus')->indexBy('id')->column();
    */
    /*第四种方法*/
    $allStatus = \common\models\Poststatus::find()->select(['name','id'])->orderBy('position')->indexBy('id')->column();
    $allAuthors = \common\models\Adminuser::find()->select(['nickname','id'])->indexBy('id')->column();

    ?>
    <?= $form->field($model, 'status')->dropDownList($allStatus,['prompt'=>'Please select']);?>

<!--    --><?//= $form->field($model, 'author_id')->dropDownList($allAuthors,['prompt'=>'Please select']);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
