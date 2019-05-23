<?php


namespace app\controllers;

use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        echo 'Это страница со списком задач';
        exit;
    }

    public function actionTask()
    {
        echo 'Это страница с карточкой задачи';
        exit;
    }

    public function actionTestValidate()
    {
        $model = new Task();

        $model->setAttributes([
            'id' => 1,
            'title' => 'Создать и описать модель для сущности "задача" (Task)',
            'description' => '',
            'author' => 'Glukhov Sergey',
            'assigned' => '',
            'created' => '',
            'deadline' => ''
        ]);

        var_dump($model->validate());
        var_dump($model->getErrors());
        exit;

//        return $this->render('test', [
//            'model' => $model
//        ]);
    }


}