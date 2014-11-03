<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 11/3/14
 * Time: 8:44 PM
 */

namespace app\transportinterface;


interface TransportInterface {

    public function send($receipient, $message);
    public function receive($sender, $message);
}