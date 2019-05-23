<?php

namespace app\validators;

use yii\validators\Validator;

class MyValidator extends Validator
{

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;

        if (!in_array($value, [3,4,5])) {
            $this->addError($model, $attribute, 'Неверный диапазон');

            return;
        }
    }
}
