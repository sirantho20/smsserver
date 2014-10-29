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
 * @property integer $from_number
 * @property integer $smsc_number
 * @property string $date_saved
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
            [['message_id', 'from_number', 'smsc_number', 'length'], 'integer'],
            [['report', 'is_flash'], 'string', 'max' => 10],
            [['message'], 'string', 'max' => 255]
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
            'smsc_number' => 'Smsc Number',
            'date_saved' => 'Date Saved',
            'report' => 'Report',
            'is_flash' => 'Is Flash',
            'length' => 'Length',
            'message' => 'Message',
        ];
    }
}
