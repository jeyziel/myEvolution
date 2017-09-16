<?php

use Phinx\Migration\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('users');
        $tab->addColumn('username','string')
            ->addColumn('email','string',['limit' => 50])
            ->addColumn('password','string',['limit' => 60])
            ->addColumn('roles','string',['limit' => 25])
            ->addTimestamps()
            ->addIndex('email',['unique' => true, 'name' => 'idx_users_email'])
            ->save();
    }

    public function down()
    {
        $this->dropTable('users');
    }

   


}
