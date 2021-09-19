<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Convenzioni]].
 *
 * @see Convenzioni
 */
class ConvenzioniQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Convenzioni[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Convenzioni|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
