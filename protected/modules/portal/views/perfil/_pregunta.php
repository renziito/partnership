<?php $opcion = [null, 'A', 'B', 'C', 'D', 'E']; ?>
<?php if ($pregunta): ?>
    <div class="card card-transparent text-justify">
        <div class="card-body no-padding">
            <div id="card-circular-minimal" class="card card-default">
                <div class="card-header">
                    <div class="card-title badge-title">Pregunta <?= $pregunta[0]['n_pregunta'] ?></div>
                </div>
                <div class="card-body">
                    <h5><?= $pregunta[0]['pregunta'] ?></h5>
                    <p>
                        <input type="radio" class="hidden" checked name="Habilidad[<?= $pregunta[0]['tipo'] ?>][<?= $pregunta[0]['n_pregunta'] ?>]"
                               value="0">
                               <?php foreach ($pregunta as $key => $alternativa): ?>
                        <div class="radio">
                            <input type="radio" name="Habilidad[<?= $pregunta[0]['tipo'] ?>][<?= $pregunta[0]['n_pregunta'] ?>]" value="<?= $key + 1 ?>"
                                   id="respuesta_<?= $alternativa['id'] ?>">
                            <label for="respuesta_<?= $alternativa['id'] ?>">
                                       <?=$opcion[$key + 1]?>) <?= $alternativa['alternativa'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>