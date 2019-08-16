<?php

class m190816_062621_addRespuestas extends CDbMigration {

    public function safeUp() {
        $this->createTable('usuario_respuesta', array(
            'id'             => 'pk auto_increment',
            'usuario_id'     => 'int NOT NULL',
            'examen_id'      => 'int NOT NULL',
            'pregunta_id'    => 'int NOT NULL',
            'alternativa_id' => 'int NOT NULL',
            'estado'         => 'boolean default TRUE',
        ));

        $this->addColumn('usuario_examen', 'respuesta', 'datetime AFTER examen_id');
        $this->addColumn('usuario_examen', 'nota', 'decimal(18,2) AFTER respuesta');
    }

    public function safeDown() {
        $this->dropTable('usuario_examen');
        $this->dropColumn('usuario_examen', 'respuesta');
        $this->dropColumn('usuario_examen', 'nota');
    }

}
