<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id => [Yii::app()->createUrl($this->module->id)],
    'Perfil de Postulantes' => [Yii::app()->createUrl('perfil')],
    'Habilidad Numérica y Comprensión Lectora'
);
?>
<div class="container text-center">
    <h1 class="intro m-b-50"><b>BIENVENIDO <?= strtoupper(Yii::app()->user->nombres) ?></b></h1>
    <div class="intro row m-t-20">
        <div class="col-xs-12">
            <h2>Habilidad Numérica y Comprensión Lectora</h2>
            <div class="text-justify m-t-20">
                <b>
                    Esta sección consta de 24 preguntas sobre deducción y comprensión de lectura.
                    En cada pregunta deberá usted elegir sólo una opción como respuesta.
                    Puedes dejar preguntas en blanco.
                    Luego se mostrarán 16 preguntas sobre operaciones matemáticas.
                    Las respuestas incorrectas tienen un valor negativo equivalente a un cuarto de
                    puntaje asignado a la pregunta correctamente contestada.
                    Las preguntas no contestadas tienen un puntaje nulo (cero).
                    La duración de la presente prueba es de 90 minutos.
                </b>
            </div>
            <div class="m-t-40 text-center">
                <button type="button" id="btn-continue" class="btn btn-danger">CONTINUAR</button>
            </div>
        </div>
    </div>
    <div class="row preguntas hidden">
        <div class="col-xs-10">
            <?php
            $form = $this->beginWidget('CActiveForm', [
                'id' => 'examen-form',
                'enableAjaxValidation' => false,
                'method' => 'POST',
                'action' => $this->createUrl('savePruebaPerfil', ['slug' => 'habilidad'])
            ]);
            ?>

            <div class="card card-transparent text-justify">
                <div class="card-body no-padding">
                    <div id="card-circular-minimal" class="card card-default">
                        <div class="card-body">
                            <h4>
                                TEXTO I: (Preguntas 1 y 2)<br><br>
                                Estamos ante un divorcio entre la economía del Perú y
                                la economía de los peruanos. Los indicadores macroeconómicos 
                                muestran, al final de 1999, una inflación de 3,7%, un crecimiento
                                del PBI de 3,3% y alrededor de US$8500 millones de reservas 
                                internacionales netas. La pregunta que nos hacemos todos los 
                                peruanos es: ¿si todo está tan bien por qué yo estoy tan mal? 
                                Lo cierto es que algunas de esas cifras tienen la verdad, 
                                la mentira y el sexo de todos los promedios.<br><br>
                                Cuando nos dicen que la economía creció 3,3% en 1999,
                                tenemos que entender que, en realidad, ese tres y pico 
                                es un promedio. Y un tres puede resultar de promediar dos 
                                y cuatro u ocho y menos dos. Lamentablemente, el crecimiento
                                de la economía del Perú, en tiempos recientes, se parece más a
                                una economía del tipo que promedia ocho y menos que a una economía
                                que promedia entre dos y cuatro. En los últimos años, han crecido
                                sectores como el de servicios públicos (teléfono, agua y luz), 
                                minería y el sector financiero. El resto del país ha permanecido 
                                al margen. El crecimiento de 3,3% de 1999, por ejemplo, escondió 
                                un crecimiento del sector primario de 11,6% y una caída del resto
                                de la economía del 2,9%.
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(1)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(2)]) ?>

            <div class="card card-transparent text-justify">
                <div class="card-body no-padding">
                    <div id="card-circular-minimal" class="card card-default">
                        <div class="card-body">
                            <h5>
                                TEXTO II: (Preguntas 3 y 4)<br><br>
                                El periodista no es un novelista, aunque, inevitablemente, 
                                sus materiales contienen un poderoso aliento de ficción, 
                                de creatividad activa sobre lo que percibe; el periodista 
                                no es un sociólogo, pero qué duda cabe de que en su trabajo 
                                habita una sociología práctica y cotidiana; el periodista 
                                no es un historiador, aunque de las hemerotecas los historiadores 
                                extraerán parte de la materia prima con la que trabajen; el 
                                periodista no es un político, ni tiene por qué ser un hombre 
                                público, pero su cercanía a los corredores del poder puede 
                                hacerle creer que es un agente de la gobernación del país, 
                                lo que cabe, por supuesto, que sea, pero sólo de manera indirecta, 
                                como en todos los casos anteriores.<br><br>
                                El periodista puede entenderse, por tanto, como una suma de todo 
                                lo que no es: no es un novelista, no es un sociólogo, no es un 
                                historiador, no es un político; luego, la adición de todas esas 
                                imposibilidades o insuficiencias, conforma, de manera muy apropiada 
                                aunque especialmente enigmática, lo que sí es. Lo que no acabamos 
                                de ser, de una manera múltiple, es lo que somos.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(3)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(4)]) ?>

            <div class="card card-transparent text-justify">
                <div class="card-body no-padding">
                    <div id="card-circular-minimal" class="card card-default">
                        <div class="card-body">
                            <h5>
                                TEXTO III: (Preguntas 5 a 10)<br><br>
                                La pintura neoclásica ajustó su propuesta a los valores 
                                asociados a la concepción de la razón que propugnaba la 
                                ilustración. Su finalidad fue didáctica: se esperaba que 
                                el autor y el espectador se apegasen a valores como la 
                                sobriedad, la moderación, el realismo, los valores 
                                democráticos y una ética laica, en oposición a los temas 
                                y enfoques religiosos. La belleza se subordina a la verdad 
                                y a la funcionalidad, y la expresión de las emociones y 
                                sentimientos debía sujetarse a las leyes de la naturaleza.
                                Comprensiblemente dicho arte, dirigido más al cerebro que 
                                al corazón, estaba destinado a perecer en un círculo de 
                                intelectuales que pretendían guiar el pincel del creador 
                                según los dictados de sus preceptos ideológicos.<br><br>
                                En cambio, la pintura romántica, aunque mantuvo ciertos 
                                elementos neoclásicos (como por ejemplo, los cánones para 
                                la representación de la figura humana), desarrolló una 
                                concepción completamente distinta. Así, acertadamente, 
                                abogó por las emociones, los sentimientos y la espontaneidad, 
                                en busca de sensibilizar al espectador, y preconizó la 
                                composición dramática, dotando a sus obras de una mayor 
                                expresividad, casi “agresiva”, lo que generó cierta 
                                animadversión en algunos por la estrechez de miradas 
                                de los críticos que defendían el decadente arte neoclásico. 
                                Para lograr su cometido, la pintura romántica desarrolló temas 
                                verdaderamente interesantes como el desnudo, el amor, la muerte, 
                                la locura, la violencia, el fervor religioso, el nacionalismo, 
                                la naturaleza y las situaciones fantásticas. Obras representativas 
                                de esta pintura fueron "El beso" de Francesco Hayez, "Loco" 
                                y "La balsa de la Medusa" de Theodore Genicault; "La muerte" 
                                de Caspar Friedrich y "La maja vestida" y "La maja desnuda" 
                                de Francisco de Goya. Esta última, en un bien pensado contraste 
                                con su más recatada versión, se constituyó en la primera obra 
                                pictórica en representar una figura femenina real que mostraba 
                                vello púbico y aún hoy se comprueba, en las reacciones que ella 
                                genera, la pretensión del arte romántico de impactar en el espectador.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(5)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(6)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(7)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(8)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(9)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(10)]) ?>

            <div class="card card-transparent text-justify">
                <div class="card-body no-padding">
                    <div id="card-circular-minimal" class="card card-default">
                        <div class="card-body">
                            <h5>
                                TEXTO IV: (Preguntas 11 y 15)<br><br>
                                En los últimos años se ha venido discutiendo el 
                                significado real del movimiento revolucionario 
                                que culminó con la independencia del Perú. 
                                Los historiadores últimos, renunciando al 
                                prestigio de la historia puramente descriptiva,
                                se han dedicado ahincadamente a delimitar a 
                                interpretar los alcances sociales y económicos
                                de los diversos eventos que configuran la
                                historia peruana; respecto a la independencia
                                se han planteado algunas preguntas inquietantes:
                                ¿Fue realmente una revolución?; si lo fue, 
                                ¿Qué transformaciones realmente profundas 
                                operó en el país? ¿A quiénes benefició en 
                                última instancia? ¿Fue un movimiento político
                                absolutamente político hispanoamericano? 
                                ¿No obedeció más bien al impulso de potencias 
                                capitalistas en un primer avance de lo que después 
                                se llamó imperialismo? Cuestiones son éstas que
                                hacen olvidar los ditirambos de ciertos historiadores
                                tradicionalistas al hablar de la hazañosa gesta
                                emancipadora, que incluso han llevado a ciertos
                                espíritus agudamente críticos al otro extremo,
                                a negar calidad revolucionaria al movimiento de independencia..
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(11)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(12)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(13)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(14)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(15)]) ?>

            <div class="card card-transparent text-justify">
                <div class="card-body no-padding">
                    <div id="card-circular-minimal" class="card card-default">
                        <div class="card-body">
                            <h5>
                                TEXTO V: (Preguntas 16 a 20)<br><br>
                                Es fácil confundir cultura con erudición. La cultura, en realidad,
                                no depende de la acumulación de conocimientos, incluso en varias materias,
                                sino del orden que estos conocimientos guardan en nuestra memoria y de la
                                presencia de estos conocimientos en nuestro comportamiento. 
                                Los conocimientos de un hombre culto pueden no ser muy numerosos
                                pero son armónicos, coherentes y, sobretodo, están relacionados
                                entre sí. En el erudito, los conocimientos parecen almacenarse 
                                en tabiques separados. En el culto, se distribuyen de acuerdo 
                                con un orden interior que permite su canje y su fructificación.
                                Sus lecturas, sus experiencias se encuentran en fermentación y
                                engendran continuamente nueva riqueza: es como el hombre que abre
                                una cuenta con interés. El erudito, como el avaro, guarda su patrimonio
                                en una media, en donde solo caben el enmohecimiento y la repetición.
                                En el primer caso, el conocimiento engendra el conocimiento, en el 
                                segundo, el conocimiento se añade al conocimiento. 
                                Un hombre que conoce al dedillo todo el teatro de Beaumarchais 
                                es un erudito pero culto es aquél que, habiendo leído solamente
                                Las Bodas de Fígaro, se da cuenta de la relación que existe en 
                                esta obra y la revolución francesa, o entre su autor y los intelectuales 
                                de nuestra época. Por eso mismo, el componente de una tribu primitiva 
                                que posee el mundo en diez nociones básicas es más culto que el 
                                especialista en arte sacro bizantino que no sabe freír un par de huevos.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(16)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(17)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(18)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(19)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(20)]) ?>

            <div class="card card-transparent text-justify">
                <div class="card-body no-padding">
                    <div id="card-circular-minimal" class="card card-default">
                        <div class="card-body">
                            <h5>
                                TEXTO VI: (Preguntas 21 a 24)<br><br>
                                El aeropuerto internacional no parece serlo, se trata de una corta
                                pista, con un terminal compuesto por dos salas, llegadas y salidas.
                                Mientras la primera se congestiona con los forasteros y quienes
                                regresan a casa que esperan pacientes su equipaje en la pequeña
                                correa transportadora; en la segunda, quienes se marchan compran
                                el afamado y cremoso queso guayanés para llevarlo a otros lugares
                                del mundo. Después de la terrible espera, al salir, los taxistas 
                                (como en cualquier parte) abordan a los viajeros, especialmente a 
                                los turistas extranjeros. Usualmente son taxis recién envejecidos 
                                marca Malibú que no poseen taxímetro, así que la tarifa debe negociarse
                                con el conductor. Ese tipo de cosas, y otras, se van aclarando por el 
                                camino.
                                Esta ciudad, como insinué al comienzo, siempre ha tenido problemas
                                de identificación. Primero se llamó Santo Tomé de Guayana, cuando
                                los conquistadores españoles se lanzaban desde los fríos Andes 
                                esparciéndose por selvas y llanos en búsqueda de El Dorado, hombres
                                como Diego de Ordaz o Antonio de Berrío, quien realizó el viaje 
                                varias veces desde Santa Fe de Bogotá, cuando la futura provincia
                                de Guayana aún le pertenecía al Virreinato de la Nueva Granada, pero 
                                el nombre y su importancia no perduraron mucho, en parte por los ataques 
                                piratas de Sir Walter Raleigh. Así que la población se trasladó cien 
                                kilómetros al accidente a la parte más angosta del río Orinoco, fundándose 
                                Angostura, la ciudad histórica que ahora parece un museo habitado, cuna y 
                                génesis de algo llamado la Gran Colombia, que los historiadores están en mora
                                de reconocer como el primer Estado multinacional moderno, gracias a la visión
                                de Simón Bolívar. Pero, lo más trascendente de esta hermosa ciudad, es que reúne
                                a diferentes poblaciones y asentamientos en un solo lugar, al que otros pioneros 
                                recogieron en un solo apelativo, Ciudad Guayana.
                                Y en la idea anterior radica gran parte del encanto de Guayana. En esa 
                                convergencia de razas y costumbres, de bailes y tradiciones, de sabores y colores.
                                La ciudad, que el taxi de color esmeralda brillante atraviesa por las vías amplias 
                                y asfaltadas, está enclavada en el Macizo Guayanés, la formación geológica más antigua
                                del planeta según recientes estudios (paradoja temporal) en la confluencia de los ríos
                                Orinoco y Caroní, cada uno con una naturaleza, importancia y apariencia diferentes. 
                                Estos dos ríos deciden al final viajar juntos hacia el Delta Amacuro, desahogándose 
                                en el Mar Caribe, al frente de Trinidad y Tobago, en el mismo sitio donde Cristóbal 
                                Colón, sin necesidad de conocer los hallazgos científicos, describió como las puertas 
                                del paraíso, bautizando para siempre su visión como “Tierra de Gracia”.
                                En el viaje corto por automóvil, se descubre que no es una ciudad hecha para transeúntes, 
                                en parte por la inclemencia del clima, los autos abundan, bien sea los grandes modelos 
                                norteamericanos que lentamente se convierten en chatarras móviles, como recuerdo rodante 
                                de la época dorada del petróleo y los subsidios en Venezuela, así como los nuevos 
                                carros de origen europeo o asiático. Un lugar común es el ruido, el venezolano 
                                normalmente es amante de la nueva vida, como dicen ellos mismos es “bonchón”, 
                                rumbero, bebedor, extrovertido; para un bogotano típico, es decir, andino, algo 
                                tímido y frío, puede ser chocante al comienzo la manera de ser, el hablar fuerte 
                                y franco, la risa estridente, pero luego comprende que es la naturaleza propia de
                                alguien con vocación caribe.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(21)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(22)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(23)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(24)]) ?>

            <hr>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(1, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(2, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(3, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(4, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(5, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(6, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(7, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(8, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(9, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(10, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(11, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(12, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(13, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(14, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(15, true)]) ?>
            <?php $this->renderPartial('_pregunta', ['pregunta' => UHabilidad::getAllforHabilidad(16, true)]) ?>

            <br>
            <button type="submit" class="btn btn-success">Terminar</button>
            <?php $this->endWidget(); ?>
        </div>
        <div class="col-xs-2">
            <div style="position:fixed">
                <div class="countdown"></div><br/>
                <progress id="progressbar" value="5400" max="5400"></progress>
            </div>
        </div>
    </div>
</div>
<script>
    $('#btn-continue').on('click', function () {

        $('input[type="radio"]').each(function () {
            if (this.value == 0) {
                this.checked = true;
            }
        });

        $('.preguntas').removeClass('hidden');
        $('.intro').addClass('hidden');

        var i = 5400;

        var counterBack = setInterval(function () {
            i--;
            if (i > 0) {
                $('#progressbar').val(i);
            } else {
                clearInterval(counterBack);
                Swal.fire({
                    type: 'error',
                    title: 'El tiempo termino',
                    text: 'Lo siento, el tiempo a terminado',
                    allowOutsideClick: false
                }).then((result) => {
                    $('#examen-form').submit();
                })
            }

        }, 1000);

        var timer2 = "90:00";
        var interval = setInterval(function () {
            var timer = timer2.split(':');
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) {
                clearInterval(interval);
                $('.countdown').html('00:00');
            } else {
                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;
                $('.countdown').html(minutes + ':' + seconds);
                timer2 = minutes + ':' + seconds;
            }
        }, 1000);

    });
</script>