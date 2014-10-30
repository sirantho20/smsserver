<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "received".
 *
 * @property integer $id
 * @property string $date_received
 * @property integer $message_id
 * @property string $date_sent
 * @property string $from_number
 * @property string $to_number
 * @property string $smsc_number
 * @property string $modem
 * @property string $date_saved
 * @property string $imsi
 * @property string $report
 * @property string $is_flash
 * @property integer $length
 * @property string $message
 */
class Received extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'received';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_received', 'date_sent', 'date_saved'], 'safe'],
            [['message_id', 'length'], 'integer'],
            [['from_number', 'message'], 'required'],
            [['from_number', 'to_number', 'modem'], 'string', 'max' => 15],
            [['smsc_number', 'imsi'], 'string', 'max' => 25],
            [['report', 'is_flash'], 'string', 'max' => 10],
            [['message'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_received' => 'Date Received',
            'message_id' => 'Message ID',
            'date_sent' => 'Date Sent',
            'from_number' => 'From Number',
            'to_number' => 'To Number',
            'smsc_number' => 'Smsc Number',
            'modem' => 'Modem',
            'date_saved' => 'Date Saved',
            'imsi' => 'Imsi',
            'report' => 'Report',
            'is_flash' => 'Is Flash',
            'length' => 'Length',
            'message' => 'Message',
        ];
    }
}
