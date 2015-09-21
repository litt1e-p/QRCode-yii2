<?php

namespace vendor\vova07\qrcode\models;

use vendor\vova07\qrcode\components\QRcode as QRlib;
use Yii;

/**
 * This is the model class for table "qrcode".
 *
 * @property string $id
 * @property string $title
 * @property integer $formats_id
 * @property string $content
 * @property string $image_url
 * @property string $redirect_url
 * @property string $post_location
 * @property integer $scans
 * @property integer $status_id
 * @property integer $deleted
 * @property string $memo
 * @property integer $author_id
 * @property integer $batch_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Qrcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qrcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'author_id'], 'required'],
            [['formats_id', 'scans', 'status_id', 'deleted', 'author_id', 'batch_id', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 100],
            [['image_url', 'redirect_url'], 'string', 'max' => 255],
            [['post_location', 'memo'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'formats_id' => 'Formats ID',
            'content' => 'Content',
            'image_url' => 'Image Url',
            'redirect_url' => 'Redirect Url',
            'post_location' => 'Post Location',
            'scans' => 'Scans',
            'status_id' => 'Status ID',
            'deleted' => 'Deleted',
            'memo' => 'Memo',
            'author_id' => 'Author ID',
            'batch_id' => 'Batch ID',
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

    public function afterSave($insert, $changedAttributes)
    {
        $update                 = [];
        $defualtRedirectUrl     = \Yii :: $app->params['SCAN_REDIRECT_URL'];
        $update['redirect_url'] = Yii::$app->request->post("redirect_url") ? : $defualtRedirectUrl;
        $update['image_url']    = $this->generateQRPng($update['redirect_url'], $this->id);
        Yii::$app->db->createCommand()->update(self::tableName(), $update, ['id'=>$this->id])->execute();
        if (parent::afterSave($insert, $changedAttributes)) {
            return true;
        } else {
            return false;
        }
    }

    public function generateQRPng($destUrl, $qrcodeId = '')
    {
        $qrcodePath = Yii::getAlias('@qrcodeRoot') . '/';
        if (!is_dir($qrcodePath)) {
            mkdir($qrcodePath, 0770, true);
        }
        $size = \Yii :: $app->params['QRCODE_SIZE'];
        $qrcodeName         = $qrcodeId . '_' . $size . '.png';
        $qrcodeFullPathName = $qrcodePath . $qrcodeId . '_' . $size . '.png';
        $destUrl            = $destUrl . '?qrid=' . $qrcodeId;
        if (file_exists($qrcodeFullPathName) && is_file($qrcodeFullPathName)) {
            return \Yii :: $app->params['QRCODE_PATH'] . $qrcodeName;
        }
        QRlib :: png($destUrl, $qrcodeFullPathName, 'L', $size, 2);
        return \Yii :: $app->params['QRCODE_PATH'] . $qrcodeName;
    }

    public function scanLog($qrcodeId)
    {
        $record = $this->findOne(['id' => $qrcodeId]);
        if (!$record) return false;
        $record['scans'] += 1;
        $record['updated_at'] = time();
        $record->save();

        $logModel = new QrcodeScanlog();
        $logModel->qrcode_id = $qrcodeId;
        $logModel->terminal_type = 1;
        $logModel->scan_ip = \Yii::$app->request->getUserIP();
        $logModel->scan_at = time();
        return $logModel->insert();
    }
}
