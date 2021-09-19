<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "convenzioni".
 *
 * @property int $id
 * @property string $titolo
 * @property string $citta
 * @property int $quantitamax
 *
 * @property UserHasConvenzioni[] $userHasConvenzionis
 * @property User[] $users
 */
class Convenzioni extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convenzioni';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titolo', 'citta', 'quantitamax'], 'required'],
            [['quantitamax'], 'integer'],
            [['titolo'], 'string', 'max' => 45],
            [['citta'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titolo' => 'Titolo',
            'citta' => 'Citta',
            'quantitamax' => 'Quantitamax',
        ];
    }

    /**
     * Gets query for [[UserHasConvenzionis]].
     *
     * @return \yii\db\ActiveQuery|UserHasConvenzioniQuery
     */
    public function getUserHasConvenzionis()
    {
        return $this->hasMany(UserHasConvenzioni::className(), ['convenzioni_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_has_convenzioni', ['convenzioni_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ConvenzioniQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConvenzioniQuery(get_called_class());
    }
}
