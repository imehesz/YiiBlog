<?php

class m20100921222826_PostsTable extends CDbMigration {
    
	public $table_name = 'Posts';

    public function up() 
	{
		$t = $this->newTable( $this->table_name );
        $t->primary_key('id');
        $t->string('title');
        $t->text('content');
        $t->string('tags');
        $t->integer('status');
        $t->timestamp('create_time');
        $t->timestamp('update_time');
        $t->integer('userID');
        // $t->text('body');
        $t->index( 'userID', 'userID' );
        $this->addTable($t);
    }
    
    public function down() 
	{
		$this->removeTable( $this->table_name );
    }
}
