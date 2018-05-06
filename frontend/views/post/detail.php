<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\HtmlPurifier;
use frontend\components\TagsCloudWidget;
use frontend\components\RecentRelyWidget;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ol class="breadcrumb">
				<li><a href="<?= Yii::$app->homeUrl?>">Homepage</a></li>
				<li><a href="<?= Yii::$app->homeUrl?>?r=post/index">Article List</a></li>
				<li class="active"><?= $model->title?></li>
			</ol>
			<div class="post">
				<div class="title">
					<h2><a href="<?= $model->url?>"><?= Html::encode($model->title)?></a></h2>
					<div class="author">
						<span class="glyphicon glyphicon-time" aria-hidden="true"><em><?= date('Y-m-d H:i:s', $model->create_time)?></em></span>
						<span class="glyphicon glyphicon-user" aria-hidden="true"><em><?= Html::encode($model->author->nickname)?></em></span>
					</div>
				</div>
			</div>
			<br>
			<div class="content">
				<?= HtmlPurifier::process($model->content)?>
			</div>
            <br>
            <div class="nav">
                <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
				<?= implode(',', $model->tagLinks);?>
                <br>
				<?= Html::a("Comment ({$model->commentCount})", $model->url.'#comments')?> | Last Update Time: <?= date('Y-m-d H:i:s', $model->update_time)?>
            </div>
            <div class="comments">
                <?php if($added):?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Thank you your comments, we will approve quickly</h4>
                    <span class="glyphicon glyphicon-time" aria-hidden="true"><em><?= date('Y-m-d H:i:s', $model->create_time)?></em></span>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"><em><?= Html::encode($model->author->nickname)?></em></span>
                </div>
				<?php endif;?>
                <?php if($model->commentCount >=1):?>
                    <h5><?= $model->commentCOunt.' Comments'?></h5>
                    <?= $this->render('_comment', array(
                            'post'=>$model,
                            'comments'=>$model->comments,
                    ))
                    ?>
                <?php endif;?>
                <h5>Comment:</h5>
                <?php
                $postComment = new \common\models\Comment();
                echo $this->render('_guestForm', array(
                        'id'=>$model->id,
                        'postModel'=>$postComment,
                ));
                ?>
            </div>
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
					<li class="list-group-item">
						<?= TagsCloudWidget::widget(['tags'=>$tags])?>
					</li>
				</ul>
			</div>
			<div class="commentBox">
				<ul class="list-group">
					<li class="list-group-item">
						<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>New Comment
					<li class="list-group-item">
						<?= RecentRelyWidget::widget(['recentComments'=>$recentComments])?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
