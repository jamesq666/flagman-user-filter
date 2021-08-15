<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $username
 * @property integer $phone_number
 * @property integer $token
 * @property integer $email
 * @property integer $birthday
 * @property integer $reg_date
 * @property integer $last_visit
 */


class User extends ActiveRecord
{
    //Функция переопределяет имя таблицы, чтобы всегда использовалась таблица User
    public static function tableName() {
        return 'user';
    }

    //Возвращает правила проверки атрибутов.
    //Правила проверки используются функцией validate ()
    //для проверки допустимости значений атрибутов.
    public function rules()
    {
        return [
            [['id', 'phone_number'], 'integer'],
            [['username', 'token', 'email'], 'safe'],
            ['birthday', 'date', 'format' => 'yyyy-MM-dd'],
            [['reg_date', 'last_visit'], 'datetime', 'format' => 'yyyy-MM-dd HH:mm:ss'],
        ];
    }

    //Определяет, как будут выглядеть лейблы полей
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'username' => 'Имя пользователя',
            'phone_number' => 'Номер телефона',
            'token' => 'Токен',
            'email' => 'Адрес электронной почты',
            'birthday' => 'Дата рождения',
            'reg_date' => 'Дата регистрации',
            'last_visit' => 'Время последнего визита',
        ];
    }
}