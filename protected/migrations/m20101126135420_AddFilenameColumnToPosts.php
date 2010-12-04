<?php

class m20101126135420_AddFilenameColumnToPosts extends CDbMigration {
    
    public function up() {
		$this->addColumn( 'Posts', 'filename', 'string' );
    }
    
    public function down() {
		$this->removeColumn( 'Posts', 'filename' );
    }
    
}
