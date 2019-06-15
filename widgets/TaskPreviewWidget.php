<?php


namespace app\widgets;
use app\models\tables\Tasks;
use yii\base\Widget;

class TaskPreviewWidget extends Widget
{
    /** @var  Tasks */
    public $model;

    public function run()
    {
        return $this->render('taskPreview',
                ['model' => $this->model]);
    }
}