<?php

use yii\db\Schema;
use yii\db\Migration;

class m141029_150719_db_setup extends Migration
{
    public function safeup()
    {
        $this->createTable('{{%received}}', [
            'id' => Schema::TYPE_PK,
            'date_received' => Schema::TYPE_DATETIME,
            'message_id'    =>  Schema::TYPE_INTEGER,
            'date_sent'     => Schema::TYPE_DATETIME,
            'from_number'   => Schema::TYPE_STRING.'(15)',
            'to_number'     => Schema::TYPE_STRING.'(15)',
            'smsc_number'   => Schema::TYPE_STRING.'(25)',
            'modem'         => Schema::TYPE_STRING.'(15)',
            'date_saved'    => Schema::TYPE_DATETIME,
            'imsi'          => Schema::TYPE_STRING.'(25)',
            'report'        => Schema::TYPE_STRING.'(10)',
            'is_flash'      => Schema::TYPE_STRING.'(10)',
            'length'        => Schema::TYPE_INTEGER,
            'message'       => Schema::TYPE_STRING
        ]);

        $this->createTable('{{%sent}}', [
            'id'            =>  Schema::TYPE_PK,
            'message_id'    =>  Schema::TYPE_INTEGER,
            'date_sent'     =>  Schema::TYPE_DATETIME,
            'from_number'   =>  Schema::TYPE_STRING,
            'to_number'     =>  Schema::TYPE_INTEGER,
            'smsc_number'   =>  Schema::TYPE_INTEGER,
            'report'        =>  Schema::TYPE_STRING.'(10)',
            'modem'         =>  Schema::TYPE_STRING.'(10)',
            'delivery_date' =>  Schema::TYPE_DATETIME,
            'is_flash'      =>  Schema::TYPE_STRING.'(10)',
            'message'       =>  Schema::TYPE_STRING
        ]);

    }

    public function safedown()
    {
       $this->dropTable('{{%received}}');
       $this->dropTable('{{%sent}}');
    }
}
