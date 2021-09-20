<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "convenzioni".
 *
 * @property int $id
 * @property string $titolo
 * @property string $citta
 * @property int $quantitamax
 *
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
            'quantitamax' => 'Capienza',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['convenzioni_id' => 'id']);
    }

    /**
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getQuanti()
    {
        return $this->getUsers()->count();
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
