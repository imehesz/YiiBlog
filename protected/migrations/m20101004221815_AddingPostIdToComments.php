<?php

class m20101004221815_AddingPostIdToComments extends CDbMigration {
    
    public function up() 
	{
		$this->addColumn( 'Comments', 'post_id', 'integer' );
    }
    
    public function down() 
	{
		$this->removeColumn( 'Comments', 'post_id' );
    }
    
}
