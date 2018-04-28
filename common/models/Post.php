<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $author_id
 */
class Post extends \yii\db\ActiveRecord
{
    private $_oldTags;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'tags', 'author_id'], 'required'],
            [['content', 'tags'], 'string'],
            [['status', 'create_time', 'update_time', 'author_id'], 'integer'],
            [['title'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'tags' => '标签',
            'status' => '状态',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'author_id' => '作者',
        ];
    }

    /**
     * function beforeSave
     * @return bool
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if ($insert) {
                $this->create_time = time();
                $this->update_time = time();
            } else {
                $this->update_time = time();
            }
            return true;
        } else {
            return false;
        }// TODO: Change the autogenerated stub
    }

    /**
     * function afterSave
     * @return void
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
        Tag::updateFrequency($this->_oldTags, $this->tags);
    }

    /**
     * function afterDelete
     * @return void
     */
    public function afterDelete()
    {
        parent::afterDelete(); // TODO: Change the autogenerated stub
        Tag::updateFrequency($this->tags, '');

    }

    public function afterFind()
    {
        parent::afterFind(); // TODO: Change the autogenerated stub
        $this->_oldTags = $this->tags;
    }

    /**
     * function getStatus0
     * @return null|static
     * 多对一
     */
    public function getStatus0(){
        return $this->hasOne(Poststatus::className(),['id'=>'status']);
    }

    /**
     * function getComments
     * @return \yii\db\ActiveQuery
     * 一对多
     */
    public function getComments(){
        return $this->hasMany(Comment::className(),['post_id'=>'id']);
    }

//    public function getAuthor(){
//        return $this->hasOne(Adminuser::className(),['author_id'=>'id']);
//    }
}
