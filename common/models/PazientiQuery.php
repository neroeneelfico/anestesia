<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Pazienti]].
 *
 * @see Pazienti
 */
class PazientiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Pazienti[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Pazienti|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
