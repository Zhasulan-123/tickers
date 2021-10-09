<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tickers}}`.
 */
class m211008_062542_create_tickers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tickers}}', [
            'id' => $this->primaryKey(),
            'bbp' => $this->decimal(6,2)->notNull()->comment('Лучший бид'),
            'bap' => $this->decimal(6,2)->notNull()->comment('Лучшее предложение'),
            'created_at' => $this->datetime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tickers}}');
    }
}
