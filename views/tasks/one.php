<?php
use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;
use \yii\helpers\ArrayHelper;

/** @var \app\models\tables\TaskComments $taskCommentForm */
/** @var \app\models\forms\TaskAttachmentsAddForm $taskAttachmentForm */

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
<div class="attachments">
    <h3>Вложения</h3>
    <?php $form = ActiveForm::begin([
        'action' => Url::to(['tasks/add-attachment']),
        'options' => ['class' => "form-inline"]
    ]);?>
    <?=$form->field($taskAttachmentForm, 'taskId')->hiddenInput(['value' => $model->id])->label(false);?>
    <?=$form->field($taskAttachmentForm, 'attachment')->fileInput();?>
    <?=Html::submitButton("Добавить",['class' => 'btn btn-default']);?>
    <?ActiveForm::end()?>
    <hr>
    <div class="attachments-history">
        <?foreach ($model->taskAttachments as $file): ?>
            <a href="/img/tasks/<?=$file->filePath?>">
                <img src="/img/tasks/small/<?=$file->filePath?>" alt="">
            </a>
        <?php endforeach;?>
    </div>

    <h3>Комментарии</h3>
    <?php $form = ActiveForm::begin(['action' => Url::to(['tasks/add-comment'])]);?>
    <?=$form->field($taskCommentForm, 'user_id')->hiddenInput(['value' => $userId])->label(false);?>
    <?=$form->field($taskCommentForm, 'task_id')->hiddenInput(['value' => $model->id])->label(false);?>
    <?=$form->field($taskCommentForm, 'comment')->textInput();?>
    <?=Html::submitButton("Добавить",['class' => 'btn btn-default']);?>
    <?ActiveForm::end()?>
    <hr>
    <div class="comment-history">
        <?foreach ($model->taskComments as $comment): ?>
            <p><strong><?=$comment->user->username?></strong>: <?=$comment->comment?></p>
        <?php endforeach;?>
    </div>
</div>
