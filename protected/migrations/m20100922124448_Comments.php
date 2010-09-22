<?php

class m20100922124448_Comments extends CDbMigration {
    
	public $table_name = 'Comments';

    public function up() 
    {
		$t = $this->newTable( $this->table_name );

        $t->primary_key('id');
        $t->string('name');
        $t->string('email');
        $t->string('website');
        $t->text('content');
        $t->integer('status');
        $t->timestamp('create_time');
        $t->timestamp('update_time');

        $this->addTable($t);        
    }
    
    public function down() 
    {
		$this->removeTable( $this->table_name );
    }
    
}
