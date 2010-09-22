<?php

class m20100922125239_Lookups extends CDbMigration {
    
 	public $table_name = 'Lookups';

    public function up() 
    {
		$t = $this->newTable( $this->table_name );

        $t->primary_key('id');
        $t->string('name');
        $t->integer('code');
        $t->string('type');
        $t->integer('position');

        $this->addTable($t);        
    }
    
    public function down() 
    {
		$this->removeTable( $this->table_name );
    }
}
