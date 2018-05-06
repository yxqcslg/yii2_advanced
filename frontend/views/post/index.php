<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->homeUrl?>">Homepage</a></li>
                <li><a href="<?= Yii::$app->homeUrl?>">Article List</a></li>

            </ol>
            <?= ListView::widget([
                    'id'=>'postList',
                    'dataProvider'=>$dataProvider,
                    'itemView'=>'_listitem',//
                    'layout'=>'{items} {pager}',
                    'pager'=>[
                            'maxButtonCount'=>10,
                            'prevPageLabel'=>Yii::t('app','Prev'),
                            'nextPageLabel'=>Yii::t('app','Next'),
                    ]
                ]
            )?>
        </div>
        <div class="col-md-3">
            <div class="searchBox">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search Article
                    <li class="list-group-item">
                        <form class="form-inline" action="index.php?r=post/index" id="w0" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" name="PostSearch[title]" id="w0input" placeholder="Search Title">

                                <!--                                <input type="text" class="form-control" name="PostFrontSearch[title]" id="w0input" placeholder="Search Title">-->
                            </div>
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="tagCloudBox">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>Tag Cloud
                    <li class="list-group-item">Tag Cloud</li>
                </ul>
            </div>
            <div class="commentBox">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>New Comment
                    <li class="list-group-item">New Comment</li>
                </ul>
            </div>
        </div>
    </div>
</div>
