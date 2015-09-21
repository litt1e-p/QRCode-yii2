<?php

namespace vendor\vova07\qrcode\models;

use Yii;

/**
 * This is the model class for table "qrcode_batch".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property integer $formats_id
 * @property string $base_url
 * @property string $redirect_url
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $status_id
 * @property integer $deleted
 * @property string $memo
 * @property integer $author_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class QrcodeBatch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qrcode_batch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'author_id'], 'required'],
            [['description'], 'string'],
            [['formats_id', 'start_time', 'end_time', 'status_id', 'deleted', 'author_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['base_url', 'redirect_url'], 'string', 'max' => 64],
            [['memo'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'formats_id' => 'Formats ID',
            'base_url' => 'Base Url',
            'redirect_url' => 'Redirect Url',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status_id' => 'Status ID',
            'deleted' => 'Deleted',
            'memo' => 'Memo',
            'author_id' => 'Author ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord) {
                $this->created_at = time();
                $this->updated_at = time();
            } else {
                $this->updated_at = time();
            }
            return true;
        } else {
            return false;
        }
    }
}
