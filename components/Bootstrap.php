<?php


namespace app\components;


use app\models\tables\Tasks;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface
{
    public function bootstrap($app)
    {
        Event::on(Tasks::className(), Tasks::EVENT_AFTER_INSERT, function ($event) {
            //var_dump($event);

            $task = $event->sender;

            Yii::$app->mailer->compose()
                ->setTo($task->responsible->email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$task->responsible->email => $task->responsible->username])
                ->setSubject($task->name)
                ->setTextBody($task->description)
                ->send();

        });


    }

}