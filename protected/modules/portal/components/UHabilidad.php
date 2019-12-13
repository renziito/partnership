<?php

class UHabilidad {

    public static function getAllforHabilidad($pregunta, $numerico = false, $correct = false) {
        $numero = " AND ex.tipo != 'numerico'";
        $sql = "";
        if ($numerico) {
            if ($numerico === true) {
                $numero = " AND ex.tipo = 'numerico'";
            } else {
                $numero = " AND ex.tipo = '{$numerico}'";
            }
        }
        if ($correct) {
            $sql = "SELECT * FROM (SELECT @i:=@i+1 AS opcion, t.* FROM (";
        }

        $sql .= "SELECT ex.n_pregunta, ex.pregunta, ex.tipo,  alt.id, alt.alternativa 
                , alt.correcta FROM db_partnership.ex_habilidad ex
                LEFT JOIN db_partnership.ex_habilidad_alternativa alt ON 
                alt.id_habilidad = ex.id AND alt.estado = TRUE
                WHERE ex.n_pregunta = " . $pregunta . $numero . " AND ex.estado = TRUE";


        if ($correct) {
            $sql .= ") as t, (SELECT @i:=0) AS foo ) as fo where fo.correcta = 1";
        }

        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    public static function getAllPensamientosAlternativas() {
        return [
            'Cuando voy a viajar' => [
                'Me gusta hacer planes y llevarlos a cabo tal como se han pensado.',
                'Hago planes con la gente.',
                'Lo hago sin restricciones y con tal apertura a las nuevas experiencias.',
                'Averiguo todo lo que se refiera al lugar que voy a visitar.'
            ],
            'Cuando estoy terminando un trabajo:' => [
                'Me concentro hasta terminar, así esté cansado.',
                'Sólo continúo si estoy en óptimas condiciones de lucidez.',
                'Busco compañía para motivarme y acabar.',
                'Me las ingenio, variando las actividades por momento.'
            ],
            'Cuando me muestran un objeto novedoso, lo primero que hago es preguntarme:' => [
                'Por qué es así y cómo podría ser mejor.',
                'Para qué sirve, cuál es el beneficio.',
                'Cómo lo puedo obtener, dónde se encuentra.',
                'Qué es y cómo son sus partes.'
            ],
            'Cuando me encuentro bloqueado (a) por algún obstáculo:' => [
                'Busco alguien para conversar y contarle lo que me pasa.',
                'Repito el proceso hasta lograr lo que quiero.',
                'Me detengo a reflexionar sobre lo que está sucediendo.',
                'Trato de hacer otras cosas hasta que me sienta relajado.'
            ],
            'Si te ganaras la lotería:' => [
                'Te irías de viaje por todo el mundo.',
                'Realizarías un gran negocio.',
                'Compartirías con algunas instituciones sociales y con la familia.',
                'Buscarías tu seguridad para siempre.'
            ]
        ];
    }

}
