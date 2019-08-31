<?php

class m190830_230539_punto_1 extends CDbMigration {

    public function safeUp() {
        $this->createTable('examen_mensaje', array(
            'id'        => 'pk auto_increment',
            'examen_id' => 'int NOT NULL',
            'min'       => 'decimal(18,2) NOT NULL',
            'max'       => 'decimal(18,2) NOT NULL',
            'mensaje'   => 'string NOT NULL',
            'estado'    => 'boolean default TRUE',
        ));
    }

    public function safeDown() {
        $this->dropTable('examen_mensaje');
    }

}
