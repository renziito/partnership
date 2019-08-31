<?php

class m190830_232816_punto_1_1 extends CDbMigration {

    public function safeUp() {
        $this->addColumn('respuesta', 'puntaje', 'decimal(18,2) AFTER respuesta');
        $this->dropColumn('respuesta', 'correcta');
    }

    public function safeDown() {
        $this->addColumn('respuesta', 'correcta', 'boolean default FALSE AFTER respuesta');
        $this->dropColumn('respuesta', 'puntaje');
    }

}
