<nav class="page-sidebar bg-partnership" data-pages="sidebar">
    <div class="sidebar-header bg-partnership">
        <img src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-fondoverde.png" alt="logo" class="brand" width="200" data-src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-fondoverde.png" data-src-retina="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-fondoverde.png" />
    </div>
    <div class="sidebar-menu">
        <ul class="menu-items">
            <li class="m-t-30 ">
                <a href="<?= Yii::app()->createUrl('portal') ?>" class="detailed">
                    <span class="title">Inicio</span>
                </a>
                <span class="icon-thumbnail"><i class="fa fa-home"></i></span>
            </li>
            <li>
                <a href="javascript:;">
                    <span class="title">Usuarios</span>
                    <span class=" arrow"></span>
                </a>
                <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
                <ul class="sub-menu">
                    <li class="">
                        <a href="<?= Yii::app()->createUrl('perfil') ?>">Mi Perfil</a>
                    </li>
                    <?php if (Yii::app()->user->rol == "admin") : ?>
                        <li class="">
                            <a href="<?= Yii::app()->createUrl('admin/usuario') ?>">Crear Usuarios</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php if (Yii::app()->user->rol == "admin") : ?>
                <li>
                    <a href="javascript:;">
                        <span class="title">Exámenes</span>
                        <span class=" arrow"></span>
                    </a>
                    <span class="icon-thumbnail"><i class="fa fa-edit"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="<?= Yii::app()->createUrl('admin/tipo') ?>">Tipo Exámen</a>
                        </li>
                        <li class="">
                            <a href="<?= Yii::app()->createUrl('admin/examen') ?>">Nuestros Exámenes</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (Yii::app()->user->rol == "admin") : ?>
                <li>
                    <a href="<?= Yii::app()->createUrl('admin/notas') ?>" class="detailed">
                        <span class="title">Notas</span>
                    </a>
                    <span class="icon-thumbnail"><i class="fa fa-eye"></i></span>
                </li>
            <?php endif; ?>
            <li class="m-t-100">
                <a href="<?= Yii::app()->createUrl('logout') ?>" class="detailed">
                    <span class="title">Salir</span>
                </a>
                <span class="icon-thumbnail"><i class="fa fa-sign-out-alt"></i></span>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</nav>
<style>
    .page-sidebar .sidebar-menu .menu-items>li ul.sub-menu {
        background-color: #8EB71E;
        color: white
    }
    .page-sidebar a:visited, .page-sidebar button:visited, .page-sidebar a:focus, .page-sidebar button:focus {
        color: black;
    }

    .page-sidebar a, .page-sidebar button {
        color: black;
    }
    .icon-thumbnail{
        line-height: 30px;
        margin-right: 0px;
        color: black;
    }
</style>