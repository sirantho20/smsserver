<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 10/29/14
 * Time: 2:39 PM
 */

namespace app\commands;
use yii\console\Controller;

class SmsController extends Controller {

    public function actionIndex($action, $file)
    {
        switch ($action) {
            case "SENT":
                \Yii::$app->sms->sent($file);
                break;
            case "RECEIVED":
                \Yii::$app->sms->received($file);
                break;
            default:
                break;
        }
    }

    public function actionSent($file)
    {

    }

    public function actionReceived($file)
    {

    }

} 