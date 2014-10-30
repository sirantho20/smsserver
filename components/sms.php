<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 10/29/14
 * Time: 4:18 PM
 */

namespace app\components;
use app\models\Received;
use app\models\Sent;
use yii\base\Component;
use yii\db\Expression;

class sms extends Component {

    public $sent_keys  = [
        'From'  => 'from_number',
        'To'    => 'to_number',
        'To_TOA'    =>'toa',
        'Flash' => 'is_flash',
        'Report' => 'report',
        'Sent'  => 'date_sent',
        'Message_id'    =>'message_id',
        'Modem' => 'modem',
        'SMSC'  => 'smsc_number'

    ];

    public $received_keys = [
        'From' => 'from_number',
        'From_SMSC'    => 'smsc_number',
        'Report'        => 'report',
        'Sent'          => 'date_sent',
        'Received'      => 'date_received',
        'Length'        => 'length',
        'Flash'         => 'is_flash',
        'IMSI'          => 'imsi',
        'Subject'       => 'modem'
    ];

    public $report_keys = [
      'Discharge_timestamp' => 'delivery_date'
    ];


    public function received($file='')
    {
        if(is_file($file))
        {
            $receive = new Received();
            $arr = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $body = '';

            foreach ( $arr as $line) {
                if($pos = strpos($line,':'))
                {
                    $key = trim(substr($line,0, $pos));
                    $value = trim(substr($line, $pos + 1, strlen($line)));

                    if(array_key_exists(trim($key), $this->received_keys))
                    {
                        //echo $key.' '.$value."\n";
                        $attr = $this->received_keys["$key"];
                        $receive->setAttribute($attr,trim($value));

                    }
                }
                else
                {
                    $body .= $line;
                }



            }
            $receive->message = $body;
            $receive->date_saved = new Expression('now()');
            if($receive->save())
            {
                echo 'saving successful'."\n";
            }
            else
            {
                print_r($receive->getErrors());
            }

        }
    }

    public function sent($file='')
    {
        //print_r((new Sent())->getAttributes());die();
        if(is_file($file))
        {
            $sent = new Sent();
            $arr = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $body = '';

            foreach ( $arr as $line) {
                if($pos = strpos($line,':'))
                {
                    $key = trim(substr($line,0, $pos));
                    $value = trim(substr($line, $pos + 1, strlen($line)));

                    if(array_key_exists(trim($key), $this->sent_keys))
                    {
                        //echo $key.' '.$value."\n";
                        $attr = $this->sent_keys["$key"];
                        $sent->setAttribute($attr,trim($value));

                    }
                }
                else
                {
                    $body .= $line;
                }



            }
            $sent->message = $body;
            $sent->date_saved = new Expression('now()');
            if($sent->save())
            {
                echo 'saving successful'."\n";
            }
            else
            {
                print_r($sent->getErrors());
            }

        }
    }

    public function report($file='')
    {
        if(is_file($file))
        {
            $arr = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $id = null;
            foreach ( $arr as $line) {
                if($pos = strpos($line,':'))
                {
                    $key = trim(substr($line,0, $pos));
                    $value = trim(substr($line, $pos + 1, strlen($line)));

                    // Fetch store message
                    if(trim($key) == 'Message_id')
                    {
                       $id = (int)$value;
                    }

                    // Append delivery date
                    if(array_key_exists(trim($key), $this->report_keys))
                    {
                        if($id != null)
                        {
                            //echo is_int($id)?'yesssss':'nooooo';
                            $record = Sent::findOne(['message_id' => $id]);
                            $record->delivery_date = trim($value);
                            if($record->save())
                            {
                                echo 'update successful'."\n";
                                break;
                            }
                            else
                            {
                                echo 'error saving delivery report';
                            }
                        }
                    }
                }

            }

        }
    }

} 