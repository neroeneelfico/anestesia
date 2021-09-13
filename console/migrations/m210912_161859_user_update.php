<?php

use yii\db\Migration;

/**
 * Class m210912_161859_user_update
 */
class m210912_161859_user_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(
            "ALTER TABLE `user` ADD `nome` VARCHAR(65) NOT NULL AFTER `username`, ADD `cognome` VARCHAR(65) NOT NULL AFTER `nome`, ADD `codicefiscale` VARCHAR(16) NOT NULL AFTER `cognome`, ADD `residenza` VARCHAR(255) NULL AFTER `codicefiscale`;"
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210912_161859_user_update cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210912_161859_user_update cannot be reverted.\n";

        return false;
    }
    */
}
