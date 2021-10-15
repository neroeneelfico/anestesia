<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pazienti".
 *
 * @property int $idpazienti
 * @property string|null $nome
 * @property string $cognome
 * @property int|null $età
 * @property string|null $uo
 * @property string $ospedale
 * @property Procedure[] $procedures
 */
class Pazienti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pazienti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cognome', 'ospedale'], 'required'],
            [['idpazienti', 'età'], 'integer'],
            [['nome', 'cognome', 'uo', 'ospedale'], 'string', 'max' => 45],
            [['idpazienti'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */


    public function attributeLabels()
    {
        return [
            'idpazienti' => 'Idpazienti',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'età' => 'Età',
            'uo' => 'U O',
            'ospedale' => 'Ospedale',
        ];
    }


    /**
     * Gets query for [[Procedures]].
     *
     * @return \yii\db\ActiveQuery|ProcedureQuery
     */
    public function getProcedures()
    {
        return $this->hasMany(Procedure::className(), ['idpazienti' => 'idpazienti']);
    }

    /**
     * {@inheritdoc}
     * @return PazientiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PazientiQuery(get_called_class());
    }
}
