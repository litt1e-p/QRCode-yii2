<?php

namespace vendor\vova07\qrcode\models;

use Yii;

/**
 * This is the model class for table "qrcode_scanlog".
 *
 * @property string $id
 * @property integer $qrcode_id
 * @property string $scan_ip
 * @property integer $terminal_type
 * @property integer $scan_at
 */
class QrcodeScanlog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qrcode_scanlog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qrcode_id', 'scan_ip', 'scan_at'], 'required'],
            [['qrcode_id', 'terminal_type', 'scan_at'], 'integer'],
            [['scan_ip'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qrcode_id' => 'Qrcode ID',
            'scan_ip' => 'Scan Ip',
            'terminal_type' => 'Terminal Type',
            'scan_at' => 'Scan At',
        ];
    }
}
