<?php
namespace console\controllers;

use common\models\Comment;
use Yii;
use yii\console\Controller;

class SmsController extends Controller{
	public function actionSend()
	{
		$newCommentCount = Comment::find()->where(['remind'=>0, 'status'=>1])->count();
		if ($newCommentCount > 0) {
			$content = '有'.$newCommentCount.'条新评论待审核.';
		}
		$result = $this->vendorSmsService($content);
		if ($result['status']=='success') {
			Comment::updateAll(['remind'=>1]);
			echo '['.date("Y-m-d H:i:s",$result['dt']).']'.$content.'['.$result['length'].']';
			return 0;
		}
	}

	protected function vendorSmsService($content){
		$result = array(
			'status'=>'success',
			'dt'=>time(),
			'length'=>43,
		);
		return $result;
	}
}