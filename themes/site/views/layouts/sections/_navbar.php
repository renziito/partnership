<nav class="page-sidebar bg-partnership" data-pages="sidebar">
    <div class="sidebar-header bg-partnership">
        <img src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-fondoverde.png" alt="logo"
             class="brand"  width="200" 
             data-src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-fondoverde.png" 
             data-src-retina="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-fondoverde.png" />
    </div>
    <div class="sidebar-menu">
        <ul class="menu-items">
            <li class="m-t-30 ">
                <a href="<?= Yii::app()->createUrl('portal') ?>" class="detailed">
                    <span class="title">Inicio</span>
                </a>
            </li>
            <li>
                <a href="<?= Yii::app()->createUrl('perfil') ?>" class="detailed">
                    <span class="title">Perfil</span>
                </a>
            </li>
            <?php if (Yii::app()->user->rol == "admin"): ?>
                <li>
                    <a href="<?= Yii::app()->createUrl('admin/usuario') ?>" class="detailed"
                       style="width: 100%">
                        <span class="title">Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::app()->createUrl('admin/examen') ?>" class="detailed">
                        <span class="title">Exámenes</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::app()->createUrl('admin/notas') ?>"
                       style="width: 100%">
                        <span class="title">Revisión de Notas</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::app()->createUrl('admin/tipo') ?>" class="detailed"
                       style="width: 100%">
                        <span class="title">Tipo Exámen</span>
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?= Yii::app()->createUrl('logout') ?>" class="detailed"
                   style="width: 100%">
                    <span class="title">Cerrar Sesión</span>
                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</nav>