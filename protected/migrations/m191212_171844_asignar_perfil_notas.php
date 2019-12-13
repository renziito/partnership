<?php

class m191212_171844_asignar_perfil_notas extends CDbMigration {

    public function safeUp() {
        $this->createTable('ex_perfil', array(
            'id' => 'pk auto_increment',
            'usuario_id' => 'int NOT NULL',
            'observacion' => 'text',
            'fecha_habilidad' => 'datetime',
            'fecha_million' => 'datetime',
            'fecha_pensamiento' => 'datetime',
            'fecha_aprendizaje' => 'datetime',
            'fecha_comunicacion' => 'datetime',
            'estado' => 'boolean default TRUE',
        ));

        $this->createTable('ex_perfil_resultados', array(
            'id' => 'pk auto_increment',
            'id_examen' => 'int NOT NULL',
            'deduccion' => 'int NOT NULL',
            'numerico' => 'int  NOT NULL',
            'comprension' => 'int NOT NULL',
            'million' => 'int NOT NULL',
            'aprendizaje' => 'int NOT NULL',
            'pensamiento' => 'int NOT NULL',
            'comunicacion' => 'int NOT NULL',
            'estado' => 'boolean default TRUE',
        ));

        $this->createTable('ex_perfil_habilidad', array(
            'id' => 'pk auto_increment',
            'id_examen' => 'int NOT NULL',
            'tipo' => 'string NOT NULL',
            'n_pregunta' => 'int NOT NULL',
            'respuesta' => 'int  NOT NULL',
            'correcta' => 'int NOT NULL',
            'estado' => 'boolean default TRUE',
        ));
    }

    public function safeDown() {
        $this->dropTable('ex_perfil');
        $this->dropTable('ex_perfil_resultados');
        $this->dropTable('ex_perfil_habilidad');
    }

}
