<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 11/3/14
 * Time: 8:53 PM
 */

namespace transportabstract;


abstract class transportAbstract {
    //abstract protected function send($receipient, $message);
    abstract protected function receive($sender, $message);

    public function send($receipient, $message)
    {

    }
}