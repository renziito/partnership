<?php

class m190911_003121_add_tipo_examen extends CDbMigration {

    public function safeUp() {
        $this->addColumn('examen', 'tipo_examen', 'int DEFAULT 1 AFTER tipo_calificacion');
    }

    public function safeDown() {
        $this->dropColumn('examen', 'tipo_examen');
    }

}
