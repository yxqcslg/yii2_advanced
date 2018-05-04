<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $content
 * @property int $status
 * @property int $create_time
 * @property int $userid
 * @property string $email
 * @property string $url
 * @property int $post_id
 * @property int $remind 0:未提醒1：已提醒
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'userid', 'email', 'post_id'], 'required'],
            [['content'], 'string'],
            [['status', 'create_time', 'userid', 'post_id', 'remind'], 'integer'],
            [['email', 'url'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'userid' => 'Userid',
            'email' => 'Email',
            'url' => 'Url',
            'post_id' => 'Post ID',
            'remind' => 'Remind',
        ];
    }

    public function getStatus0(){
        return $this->hasOne(Commentstatus::className(),['id'=>'status']);
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'userid']);
    }
    public function getTitle(){
        return $this->hasOne(Post::className(),['id'=>'post_id']);
    }
    public function getBeginning(){
        $tempStr = strip_tags($this->content);
        $tempLen = mb_strlen($tempStr);
        return mb_substr($tempStr, 0, 10, 'utf-8').(($tempLen > 10)?'....':'');
    }

    public function approve(){
        $this->status = 2;//设置评论状态为已审核状态
        return ($this->save() ? true: false);
    }

    public static function getPendingCommentCount(){
        return Comment::find()->where(['status'=>1])->count();
    }
}
