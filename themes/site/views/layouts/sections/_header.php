<div class="header ">
    <a href="#" class="btn-link toggle-sidebar d-lg-none" data-toggle="sidebar">
        <i class="fas fa-bars"></i>
    </a>
    <div class="bg-partnership hidden-sm hidden-xs">
        <div class="brand inline m-l-5 ">
            <img src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-fondoverde.png" alt="logo" 
                 data-src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-fondoverde.png" 
                 data-src-retina="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-fondoverde.png"
                 width="200px">
        </div>
    </div>
    <div class="d-flex align-items-center hidden">
        <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
            <span class="semi-bold"><?= Yii::app()->user->nombres ?></span>
        </div>
        <div class="dropdown pull-right d-lg-block d-none">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/images/gear.png" alt="" 
                         data-src="<?= Yii::app()->theme->baseUrl; ?>/assets/images/gear.png" 
                         data-src-retina="<?= Yii::app()->theme->baseUrl; ?>/assets/images/gear.png" width="32" height="32">
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <a href="<?= Yii::app()->createUrl('perfil') ?>" class="dropdown-item"><i class="fas fa-user"></i> Perfil</a>
                <a href="<?= Yii::app()->createUrl('logout') ?>" class="clearfix bg-master-lighter dropdown-item">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="fas fa-power-off"></i></span>
                </a>
            </div>
        </div>

    </div>
</div>