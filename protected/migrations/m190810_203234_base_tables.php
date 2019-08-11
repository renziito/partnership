<?php

class m190810_203234_base_tables extends CDbMigration {

    public function safeUp() {
        $this->createTable('usuario', array(
            'id'        => 'pk auto_increment',
            'username'  => 'string NOT NULL',
            'password'  => 'string NOT NULL',
            'nombres'   => 'string NOT NULL',
            'apellidos' => 'string NOT NULL',
            'dni'       => 'string NOT NULL',
            'correo'    => 'string',
            'rol'       => 'string NOT NULL',
            'fecha'     => 'datetime default NOW()',
            'estado'    => 'boolean default TRUE',
        ));

        $this->insert('usuario', array(
            'username'  => 'sa',
            'password'  => password_hash('sa', PASSWORD_DEFAULT),
            'nombres'   => 'Super',
            'apellidos' => 'Administrador',
            'dni'       => '12345678',
            'correo'    => 'sepia.aki@gmail.com',
            'rol'       => 'admin'
        ));

        $this->insert('usuario', array(
            'username'  => 'pibe',
            'password'  => password_hash('pibe', PASSWORD_DEFAULT),
            'nombres'   => 'Roberto',
            'apellidos' => 'Quezada',
            'correo'    => 'roberto@quezada.pe',
            'dni'       => '12345678',
            'rol'       => 'admin'
        ));

        $this->createTable('usuario_examen', array(
            'id'         => 'pk auto_increment',
            'usuario_id' => 'int NOT NULL',
            'examen_id'  => 'int NOT NULL',
            'hasta'      => 'date',
            'fecha'      => 'datetime default NOW()',
            'estado'     => 'boolean default TRUE',
        ));

        $this->createTable('tipo', array(
            'id'     => 'pk auto_increment',
            'tipo'   => 'string NOT NULL',
            'fecha'  => 'datetime default NOW()',
            'estado' => 'boolean default TRUE',
        ));

        $this->createTable('examen', array(
            'id'      => 'pk auto_increment',
            'tipo_id' => 'int NOT NULL',
            'timer'   => 'int default 0',
            'random'  => 'boolean default false',
            'fecha'   => 'datetime default NOW()',
            'estado'  => 'boolean default TRUE',
        ));

        $this->createTable('pregunta', array(
            'id'        => 'pk auto_increment',
            'examen_id' => 'int NOT NULL',
            'pregunta'  => 'text NOT NULL',
            'random'    => 'boolean default false',
            'estado'    => 'boolean default TRUE',
        ));

        $this->createTable('respuesta', array(
            'id'          => 'pk auto_increment',
            'pregunta_id' => 'int NOT NULL',
            'respuesta'   => 'text NOT NULL',
            'correcta'    => 'boolean default FALSE',
            'estado'      => 'boolean default TRUE',
        ));
    }

    public function safeDown() {
        $this->dropTable('usuario');
        $this->dropTable('usuario_examen');
        $this->dropTable('tipo');
        $this->dropTable('examen');
        $this->dropTable('pregunta');
        $this->dropTable('respuesta');
    }

}
