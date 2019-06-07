<?php
use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;
use \yii\helpers\ArrayHelper;


?>
<div class="task-edit">
    <div class="task-main">
        <?php $form = ActiveForm::begin(['action' => Url::to(['tasks/save', 'id' => $model->id])]);?>
        <?=$form->field($model, 'name')->textInput();?>
        <div class="row">
            <div class="col-lg-4">
                <?=$form->field($model, 'status_id')
                    ->dropDownList(ArrayHelper::map(\app\models\tables\TaskStatuses::find()->all(),'id','name'), [
                        'prompt'=>'Выбрать',])?>
            </div>
            <div class="col-lg-4">
                <?=$form->field($model, 'responsible_id')
                    ->dropDownList(ArrayHelper::map(\app\models\tables\Users::find()->all(),'id','username'), [
                        'prompt'=>'Выбрать',])?>
            </div>
            <div class="col-lg-4">
                <?=$form->field($model, 'deadline')
                    ->textInput(['type' => 'date'])
                ?>
            </div>
        </div>

        <div>
            <?=$form->field($model, 'description')
                ->textarea()?>
        </div>
        <?=Html::submitButton("Сохранить",['class' => 'btn btn-success']);?>
        <?ActiveForm::end()?>
    </div>
</div>
