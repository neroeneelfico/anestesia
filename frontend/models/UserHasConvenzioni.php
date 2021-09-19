<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_has_convenzioni".
 *
 * @property int $user_id
 * @property int $convenzioni_id
 *
 * @property Convenzioni $convenzioni
 * @property User $user
 */
class UserHasConvenzioni extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_has_convenzioni';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'convenzioni_id'], 'required'],
            [['user_id', 'convenzioni_id'], 'integer'],
            [['user_id', 'convenzioni_id'], 'unique', 'targetAttribute' => ['user_id', 'convenzioni_id']],
            [['convenzioni_id'], 'exist', 'skipOnError' => true, 'targetClass' => Convenzioni::className(), 'targetAttribute' => ['convenzioni_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'convenzioni_id' => 'Convenzioni ID',
        ];
    }

    /**
     * Gets query for [[Convenzioni]].
     *
     * @return \yii\db\ActiveQuery|ConvenzioniQuery
     */
    public function getConvenzioni()
    {
        return $this->hasOne(Convenzioni::className(), ['id' => 'convenzioni_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserHasConvenzioniQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserHasConvenzioniQuery(get_called_class());
    }
}
