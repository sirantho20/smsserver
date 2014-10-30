<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sent".
 *
 * @property integer $id
 * @property integer $message_id
 * @property string $date_sent
 * @property string $from_number
 * @property string $to_number
 * @property integer $smsc_number
 * @property string $report
 * @property string $modem
 * @property string $delivery_date
 * @property string $date_saved
 * @property string $is_flash
 * @property string $message
 */
class Sent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id', 'smsc_number'], 'integer'],
            [['date_sent', 'delivery_date', 'date_saved'], 'safe'],
            [['to_number', 'message'], 'required'],
            [['from_number'], 'string', 'max' => 255],
            [['to_number'], 'string', 'max' => 20],
            [['report', 'modem', 'is_flash'], 'string', 'max' => 10],
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
            'message_id' => 'Message ID',
            'date_sent' => 'Date Sent',
            'from_number' => 'From Number',
            'to_number' => 'To Number',
            'smsc_number' => 'Smsc Number',
            'report' => 'Report',
            'modem' => 'Modem',
            'delivery_date' => 'Delivery Date',
            'date_saved' => 'Date Saved',
            'is_flash' => 'Is Flash',
            'message' => 'Message',
        ];
    }
}
