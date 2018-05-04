<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'id',
                'contentOptions'=>['width'=>'30px'],
            ],
            //'content:ntext',
            [
                'attribute'=>'content',
                'value'=>'beginning',
//                'value'=>function($model){
//                    $tempStr = strip_tags($model->content);
//                    $tempLen = mb_strlen($tempStr);
//                    return mb_substr($tempStr, 0, 20, 'utf-8').(($tempLen > 20)?'....':'');
//                }
            ],
            //'status',
            [
                'attribute'=>'status',
                'value'=>'status0.name',
                'filter'=>\common\models\Commentstatus::find()->select(['name', 'id'])->orderBy('position')->indexBy('id')->column(),
            ],
            //'userid',
            [
                'attribute'=>'user.username',
                'label'=>'Username',
                'value'=>'user.username',
                //'filter'=>\common\models\User::find()->select(['username', 'id'])->orderBy('id')->indexBy('id')->column(),
            ],
            //'email:email',
            //'url:url',
            //'post_id',
            //'post.title',
            //'remind',
            //'create_time:datetime',
            [
                'attribute'=>'create_time',
                'format'=>['date', 'php:Y-m-d H:i:s'],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
