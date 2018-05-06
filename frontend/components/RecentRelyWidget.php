<?php
namespace frontend\components;

use yii;
use yii\Base\Widget;
use yii\helpers\Html;

class RecentRelyWidget extends Widget{
	public $recentComments;

	public function init()
	{
		parent::init(); // TODO: Change the autogenerated stub
	}

	public function run()
	{
		$commentStr = '';
		$fontStyle = array(
			"6"=>"danger",
			"5"=>"info",
			"4"=>"warning",
			"3"=>"primary",
			"2"=>"success",
		);
		foreach ($this->recentComments as $comment) {
			$commentStr .='<div class="post"><div class="title"><p style="color:#777777;font-style: italic;">'.nl2br($comment->content).'</p><p style="font-size: 8pt;color:blue;"><a href="'.$comment->post->url.'">'.Html::encode($comment->post->title).'</a></p><hr></div></div>';
		}
		return $commentStr;
	}
}