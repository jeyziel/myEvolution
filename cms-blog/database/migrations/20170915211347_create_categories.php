<?php


use Phinx\Migration\AbstractMigration;

class CreateCategories extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('categories');
        $tab->addColumn('name','string',['limit' => 50])
            ->addColumn('description','text')
            ->addTimestamps()
            ->addIndex('name',['unique' => true, 'name' => 'idx_categories_name'])
            ->save();
    }

    public function down()
    {
        $this->dropTable('categories');
    }
}
