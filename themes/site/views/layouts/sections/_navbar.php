<nav class="page-sidebar bg-partnership" data-pages="sidebar">
    <div class="sidebar-header bg-partnership">
        <img src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo_white.png" alt="logo"
             class="brand"  width="78" 
             data-src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo_white.png" 
             data-src-retina="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo_white.png" />
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
            <li>
                <a href="<?= Yii::app()->controller->createUrl('index') ?>" class="detailed"
                   style="width: 100%">
                    <span class="title">Banco de Preguntas</span>
                </a>
            </li>
            <li>
                <a href="<?= Yii::app()->controller->createUrl('index') ?>" class="detailed">
                    <span class="title">Examenes</span>
                </a>
            </li>
            <li>
                <a href="<?= Yii::app()->controller->createUrl('index') ?>"><span class="title">Social</span></a>
            </li>
            <li>
                <a href="<?= Yii::app()->controller->createUrl('index') ?>"><span class="title">Social</span></a>
            </li>
            <li>
                <a href="<?= Yii::app()->controller->createUrl('index') ?>"><span class="title">Social</span></a>
            </li>
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