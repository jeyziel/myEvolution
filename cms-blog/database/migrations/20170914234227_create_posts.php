<?php

use Phinx\Migration\AbstractMigration;

class CreatePosts extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('posts');
        $tab->addColumn('user_id','integer')
            ->addColumn('title','string',['limit' => 25])
            ->addColumn('description','string',['limit' => 200])
            ->addColumn('image','string',['limit' => 100])
            ->addColumn('content','text')
            ->addTimestamps()
            ->addForeignKey('user_id', 'users', 'id',['delete' => 'RESTRICT', 'update' => 'NO_ACTION','constraint' => 'fk_posts_user_id_posts'])
            ->save();
    }

    public function down()
    {
        $this->dropTable('posts');
    }
}
