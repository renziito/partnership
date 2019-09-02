<?php

class m190901_152440_tipo_calificacion extends CDbMigration {

    public function safeUp() {
        $this->addColumn('examen', 'tipo_calificacion', 'int AFTER tipo_id');
    }

    public function safeDown() {
        $this->dropColumn('examen', 'tipo_calificacion');
    }

}
