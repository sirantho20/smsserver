<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 11/3/14
 * Time: 8:59 PM
 */

namespace transporters;


use app\transportinterface\TransportInterface;

class GammuTransporter implements  TransportInterface {
    public function send($receipient, $message)
    {

    }
    public function receive($sender, $message)
    {

    }
} 