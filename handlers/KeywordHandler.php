<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 11/3/14
 * Time: 9:07 PM
 */

namespace handlers;


use yii\base\Component;

class KeywordHandler extends Component {

    public $sender;
    public $keyword;
    public $message;

    public function init($event)
    {

    }
} 