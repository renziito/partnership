<?php

class m191209_185340_examenes_personalidad extends CDbMigration {

    public function safeUp() {
        $this->createTable('ex_habilidad', array(
            'id' => 'pk auto_increment',
            'tipo' => 'string NOT NULL',
            'pregunta' => 'text NOT NULL',
            'n_pregunta' => 'int NOT NULL',
            'estado' => 'boolean default TRUE',
        ));

        $this->createTable('ex_habilidad_alternativa', array(
            'id' => 'pk auto_increment',
            'id_habilidad' => 'int NOT NULL',
            'alternativa' => 'string NOT NULL',
            'correcta' => 'boolean default FALSE',
            'estado' => 'boolean default TRUE',
        ));
    }

    public function safeDown() {
        $this->dropTable('ex_habilidad');
        $this->dropTable('ex_habilidad_alternativa');
    }

}
