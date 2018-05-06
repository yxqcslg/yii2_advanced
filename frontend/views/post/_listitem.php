<?php
use yii\helpers\Html;
?>
<div class="post">
	<div class="title">
		<h2><a href="<?= $model->url?>"><?= Html::encode($model->title)?></a></h2>
		<div class="author">
			<span class="glyphicon glyphicon-time" aria-hidden="true"><em><?= date('Y-m-d H:i:s', $model->create_time)?></em></span>
			<span class="glyphicon glyphicon-user" aria-hidden="true"><em><?= Html::encode($model->author->nickname)?></em></span>
		</div>
	</div>
	<div class="content">
		<?= $model->beginning?>
	</div>
	<br>
	<div class="nav">
		<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
		<?= implode(',', $model->tagLinks);?>
		<br>
		<?= Html::a("Comment ({$model->commentCount})", $model->url.'#comments')?> | Last Update Time: <?= date('Y-m-d H:i:s', $model->update_time)?>
	</div>
</div>
