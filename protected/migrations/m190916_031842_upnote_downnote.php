<?php

class m190916_031842_upnote_downnote extends CDbMigration {

    public function safeUp() {
        $this->addColumn('examen', 'puntaje_positivo', 'int DEFAULT 1 AFTER tipo_examen');
        $this->addColumn('examen', 'puntaje_negativo', 'int DEFAULT 0 AFTER puntaje_positivo');
    }

    public function safeDown() {
        $this->dropColumn('examen', 'puntaje_positivo');
        $this->dropColumn('examen', 'puntaje_negativo');
    }

}
