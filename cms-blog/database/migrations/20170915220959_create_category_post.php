<?php


use Phinx\Migration\AbstractMigration;

class CreateCategoryPost extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('category_post',['id' => false, 'primary_key' => ['category_id','post_id']]);
        $tab->addColumn('category_id','integer')
            ->addColumn('post_id','integer')
            ->addTimestamps()
            ->save();
    }
}
