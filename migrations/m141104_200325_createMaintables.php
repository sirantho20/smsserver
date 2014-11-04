<?php

use yii\db\Schema;
use yii\db\Migration;

class m141104_200325_createMaintables extends Migration
{
    public function safeup()
    {
        $this->execute(file_get_contents(Yii::getAlias('@app').'/commands/data.sql'));
    }

    public function safedown()
    {
        $this->dropTable('gammu_settings');
        $this->dropTable('smpp_settings');
        $this->dropTable('smst_settings');
        $this->dropTable('keywords');
        $this->dropTable('transports');
    }
}
