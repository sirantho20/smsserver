<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "sent".
 *
 * @property integer $id
 * @property integer $message_id
 * @property string $date_sent
 * @property integer $from_number
 * @property integer $to_number
 * @property integer $smsc_number
 * @property string $report
 * @property string $modem
 * @property string $delivery_date
 * @property string $is_flash
 * @property string $message
 */
class Sent extends ActiveRecord
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
            [['message_id', 'from_number', 'to_number', 'smsc_number'], 'integer'],
            [['date_sent', 'delivery_date'], 'safe'],
            [['report', 'modem', 'is_flash'], 'string', 'max' => 10],
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
            'message_id' => 'Message ID',
            'date_sent' => 'Date Sent',
            'from_number' => 'From Number',
            'to_number' => 'To Number',
            'smsc_number' => 'Smsc Number',
            'report' => 'Report',
            'modem' => 'Modem',
            'delivery_date' => 'Delivery Date',
            'is_flash' => 'Is Flash',
            'message' => 'Message',
        ];
    }


}
