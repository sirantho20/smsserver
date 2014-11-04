<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 11/3/14
 * Time: 9:02 PM
 */

namespace transporters;


use events\SendEvent;
use yii\base\Component;
use yii\db\AfterSaveEvent;

class SmstoolsTransporter extends Component {

    const BEFORE_RECEIVE = 'receivedevent';
    const AFTER_RECEIVE = 'aftersend';
    const BEFORE_SEND = 'beforesent';
    const AFTER_SEND = 'aftersend';

    public $outgoing_location;

    public function init(Array $config)
    {




        parent::init();

    }

    public function send($receipient, $message)
    {
        $key = 'send_'.\Yii::$app->security->generateRandomString(5);

        $file = $this->outgoing_location.'/'.$key;
        $content = "From: 000000000"."\n";
        $content .= "To: ".$receipient."\n";
        $content .= "\n";
        $content .= utf8_encode($message);
        try
        {
            $stream = fopen($file,'x');
            $event = new SendEvent();
            $event->receipient = $receipient;
            $event->transport = $message;

            // Trigger before send event
            $this->trigger(self::BEFORE_SEND,$event);

            // Write to outgoing file
            fwrite($stream,$content);
            fclose($stream);

            //Trigger after send event
            $this->trigger(self::AFTER_SEND, $event);

        }
        catch(\Exception $ex)
        {
            echo $ex->getMessage();
        }


    }
    public function receive($sender, $message)
    {

    }

} 