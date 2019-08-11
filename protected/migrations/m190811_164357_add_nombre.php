<?php

class m190811_164357_add_nombre extends CDbMigration {

    public function safeUp() {
        $this->addColumn('examen', 'titulo', 'string AFTER id');
    }

    public function safeDown() {
        $this->dropColumn('examen', 'titulo');
    }

}
