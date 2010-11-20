<?php

class m20101120002810_AddPublishedDateToPostTable extends CDbMigration {
    
    public function up() {
		$this->addColumn( 'Posts', 'published_date', 'timestamp' );
    }
    
    public function down() {
		$this->removeColumn( 'Posts', 'published_date' );
    }
    
}
