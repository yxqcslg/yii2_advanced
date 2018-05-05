<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adminusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Adminuser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'nickname',
            //'password',
            'email:email',
            //'profile:ntext',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' =>'{view} {update} {resetpwd} {privilege}',
                'buttons'=>[
                        'resetpwd'=>function($url, $model, $key){
                            $options =
                                [
								'title'=>Yii::t('yii','Reset Password'),
								'aria-label'=>Yii::t('yii','Reset Password'),
                                'data-pjax'=>'0',
							    ];
							$icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-lock"]);
							return Html::a($icon, $url, $options);
                            },
					    'privilege'=>function($url, $model, $key){
                            $options =
                                [
                                    'title'=>Yii::t('yii','Privilege'),
                                    'aria-label'=>Yii::t('yii','Privilege'),
                                    'data-pjax'=>'0',
                                ];
                            $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-user"]);
                            return Html::a($icon, $url, $options);
					    }
						],
            ],
        ],
    ]); ?>
</div>
