<?php

class m20100922124744_Tags extends CDbMigration {

 	public $table_name = 'Tags';

    public function up() 
    {
		$t = $this->newTable( $this->table_name );

        $t->primary_key('id');
        $t->string('name');
        $t->integer('frequency');

        $this->addTable($t);        
    }
    
    public function down() 
    {
		$this->removeTable( $this->table_name );
    }
}
