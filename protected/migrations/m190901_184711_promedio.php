<?php

class m190901_184711_promedio extends CDbMigration {

    public function safeUp() {
        $this->createTable('examen_promedio', array(
            'id'        => 'pk auto_increment',
            'examen_id' => 'int NOT NULL',
            'promedio'  => 'int NOT NULL',
            'mensaje'   => 'string NOT NULL',
            'estado'    => 'boolean default TRUE',
        ));
    }

    public function safeDown() {
        $this->dropTable('examen_promedio');
    }

}
