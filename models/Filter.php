<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property string $value
 */

class Filter extends ActiveRecord
{
    const FILTER_TYPE_USERNAME = 0;
    const FILTER_TYPE_PHONE = 1;
    const FILTER_TYPE_TOKEN = 2;
    const FILTER_TYPE_EMAIL = 3;
    const FILTER_TYPE_BIRTHDAY = 4;

    public static $filter_type_name = [
      self::FILTER_TYPE_USERNAME => 'Имя пользователя',
      self::FILTER_TYPE_PHONE => 'Телефон',
      self::FILTER_TYPE_TOKEN => 'Токен',
      self::FILTER_TYPE_EMAIL => 'E-mail',
      self::FILTER_TYPE_BIRTHDAY => 'Дата рождения',
    ];

    //Функция переопределяет имя таблицы, чтобы всегда использовалась таблица Filter
    public static function tableName() {
        return 'filter';
    }

    //Возвращает правила проверки атрибутов.
    //Правила проверки используются функцией validate ()
    //для проверки допустимости значений атрибутов.
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'type', 'value'], 'safe'],
        ];
    }

    //Определяет, как будут выглядеть лейблы полей
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'title' => 'Название',
            'type' => 'Тип',
            'value' => 'Значение',
        ];
    }
}