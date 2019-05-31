<?php


namespace app\widgets;
use yii\base\Widget;

class TaskPreviewWidget extends Widget
{
    public $model;

    public function run()
    {
        return $this->render('taskPreview', ['model' => $this->model]);
    }
}