<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 11/4/14
 * Time: 7:45 PM
 */

namespace events;

use yii\base\Event;

class SendEvent extends Event {
    public $receipient;
    public $message;
    public $keyword;
    public $transport;

} 