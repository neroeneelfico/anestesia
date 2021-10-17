<?php

use yii\db\Migration;

/**
 * Class m211017_125205_tipointervento_create
 */
class m211017_125205_tipointervento_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(
            "ALTER TABLE `procedure` ADD `tipointervento` VARCHAR(65) NULL AFTER `idanestesista`;"
        );    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211017_125205_tipointervento_create cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211017_125205_tipointervento_create cannot be reverted.\n";

        return false;
    }
    */
}
