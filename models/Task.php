<?php


namespace app\models;


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
            [['id', 'title', 'author', 'created'], 'required'],
            ['$description', 'safe'],
            ['$assigned', 'safe'],
            ['$created', 'myValidator'],
            ['$deadline', 'safe'],
        ];
    }
}