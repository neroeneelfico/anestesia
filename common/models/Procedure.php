<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "procedure".
 *
 * @property int $idprocedure
 * @property int $idpazienti
 * @property int $idanestesista
 * @property string|null $tipoanestesia
 * @property string|null $analgesiaperiop
 * @property string|null $analgesiapostop
 *
 * @property Dolore[] $dolores
 * @property User $idanestesista0
 * @property Pazienti $idpazienti0
 */
class Procedure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'procedure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpazienti',], 'required'],
            [['idpazienti', ], 'integer'],
            [['analgesiaperiop', 'analgesiapostop'], 'string'],
            [['tipoanestesia'], 'string', 'max' => 45],
            [['idpazienti'], 'exist', 'skipOnError' => true, 'targetClass' => Pazienti::className(), 'targetAttribute' => ['idpazienti' => 'idpazienti']],
        ];
    }

    public function beforeSave($insert)
    {
        $this->idanestesista = Yii::$app->user->id;
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idprocedure' => 'Id della procedura',
            'idpazienti' => 'Idpazienti',
            'idanestesista' => 'Idanestesista',
            'tipoanestesia' => 'Tipologia Anestesia',
            'analgesiaperiop' => 'Analgesia Perioperatoria',
            'analgesiapostop' => 'Analgesia Postoperatoria',
        ];
    }

    /**
     * Gets query for [[Dolores]].
     *
     * @return \yii\db\ActiveQuery|DoloreQuery
     */
    public function getDolores()
    {
        return $this->hasMany(Dolore::className(), ['idprocedure' => 'idprocedure']);
    }

    public function getOrarioDolore(){
        $dolorearray = [];
        foreach($this->dolores as $dolore) {
           $dolorearray[] = $dolore->scaladolore. "------------------".$dolore->orariodolore;
        }
        return implode(',',$dolorearray);
    }

    /**
     * Gets query for [[Idanestesista0]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getIdanestesista0()
    {
        return $this->hasOne(User::className(), ['id' => 'idanestesista']);
    }
    public function getNomeAnestesista() {

        return $this->idanestesista0->nome." ".$this->idanestesista0->cognome;

    }

    public function getNomePaziente()
    {

        return $this->idpazienti0->nome . " " . $this->idpazienti0->cognome;
    }

    /**
     * Gets query for [[Idpazienti0]].
     *
     * @return \yii\db\ActiveQuery|PazientiQuery
     */
    public function getIdpazienti0()
    {
        return $this->hasOne(Pazienti::className(), ['idpazienti' => 'idpazienti']);
    }

    /**
     * {@inheritdoc}
     * @return ProcedureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProcedureQuery(get_called_class());
    }
}