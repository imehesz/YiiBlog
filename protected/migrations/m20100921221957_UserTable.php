<?php

class m20100921221957_UserTable extends CDbMigration 
{

	public $table_name = 'Users';
    
    public function up() 
	{
		$t = $this->newTable( $this->table_name );
        $t->primary_key('id');
        $t->string('username');
        $t->string('password');
        $t->string('salt');
        $t->string('email');
        $t->string('profile');
        // $t->text('body');
        // $t->index('posts_title', 'title');
        $this->addTable($t);		
    }
    
    public function down() 
	{
		$this->removeTable( $this->table_name );
    }
    
}
