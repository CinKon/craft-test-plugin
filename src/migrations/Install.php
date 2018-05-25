<?php
namespace cinkon\kittntestpluginfoo\migrations;

use craft\db\Migration;

class Install extends Migration
{
    // Public Methods
    // =========================================================================

    public function safeUp()
    {
        if (!$this->db->tableExists('{{%kittntestpluginfoo}}')) {
            $this->createTables();
            $this->createIndexes();
        }

        return true;
    }

    public function safeDown()
    {
        return true;
    }

    // Protected Methods
    // =========================================================================

    protected function createTables()
    {
        $this->createTable('{{%kittntestpluginfoo}}', [
            'id' => $this->integer()->notNull(),
            'ownerId' => $this->integer()->notNull(),
            'ownerSiteId' => $this->integer(),
            'fieldId' => $this->integer()->notNull(),
            'typeId' => $this->integer()->notNull(),
            'sortOrder' => $this->smallInteger()->unsigned(),
            'dateCreated' => $this->dateTime()->notNull(),
            'dateUpdated' => $this->dateTime()->notNull(),
            'uid' => $this->uid(),
            'PRIMARY KEY(id)',
        ]);
    }

    protected function createIndexes()
    {
        $this->createIndex(null, '{{%kittntestpluginfoo}}', ['ownerId'], false);
        $this->createIndex(null, '{{%kittntestpluginfoo}}', ['fieldId'], false);
        $this->createIndex(null, '{{%kittntestpluginfoo}}', ['typeId'], false);
        $this->createIndex(null, '{{%kittntestpluginfoo}}', ['ownerSiteId'], false);
    }
}
