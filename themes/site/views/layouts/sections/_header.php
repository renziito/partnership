<div class="header ">
    <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
    </a>
    <div class="">
        <div class="brand inline  m-l-10 ">
            <img src="<?= Yii::app()->getBaseUrl() ?>/images/logo.png" alt="logo" 
                 data-src="<?= Yii::app()->getBaseUrl() ?>/images/logo.png" 
                 data-src-retina="<?= Yii::app()->getBaseUrl() ?>/images/logo.png">
        </div>
    </div>
    <div class="d-flex align-items-center">
        <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
            <span class="semi-bold"><?= Yii::app()->user->nombres ?></span>
        </div>
        <div class="dropdown pull-right d-lg-block d-none">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar.png" alt="" 
                         data-src="<?= Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar.png" 
                         data-src-retina="<?= Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar.png" width="32" height="32">
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <a href="<?= Yii::app()->createUrl('perfil') ?>" class="dropdown-item"><i class="fas fa-user"></i> Perfil</a>
                <a href="<?= Yii::app()->createUrl('logout') ?>" class="clearfix bg-master-lighter dropdown-item">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                </a>
            </div>
        </div>

    </div>
</div>