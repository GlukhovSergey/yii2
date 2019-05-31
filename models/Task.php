<?php


namespace app\models;


use app\validators\MyValidator;
use yii\base\Model;

class Task extends Model
{
    public $id;
    public $title;
    public $description;
    public $author;
    public $assigned;
    public $created;
    public $deadline;

    public function rules()
    {
        return [
            [['id', 'title', 'author'], 'required'],
            ['description', 'safe'],
            ['assigned', 'safe'],
            ['created', MyValidator::class],
            ['deadline', 'safe'],
        ];
    }
}