<nav class="page-sidebar" data-pages="sidebar">
    <div class="sidebar-header">
        <img src="<?= Yii::app()->getBaseUrl() ?>/images/logo_white.png" alt="logo" class="brand" 
             data-src="<?= Yii::app()->getBaseUrl() ?>/images/logo_white.png" data-src-retina="<?= Yii::app()->getBaseUrl() ?>/images/logo_white.png" 
             width="78" style="margin-top: 0px;">
    </div>
    <div class="sidebar-menu">
        <ul class="menu-items">
            <?php foreach (Menu::getMenu() as $k => $menu): ?>
                <?php if ($menu['admin'] == false || Yii::app()->user->rol == "admin"): ?>
                    <li class="<?= ($k == 0 ? 'm-t-30 ' : '') . ($menu['class']) ?>">
                        <a href="<?= $menu['link'] ?>">
                            <span class="title"><?= $menu['name'] ?></span>
                            <?php if (isset($menu['sub'])): ?>
                                <span class="<?= $menu['class'] ?> arrow"></span></a>
                        <?php else: ?>
                            </a>
                        <?php endif; ?>
                        <span class="bg-success icon-thumbnail"><i class="<?= $menu['icon'] ?>"></i></span>
                        <?php if (isset($menu['sub'])): ?>
                            <ul class="sub-menu">
                                <?php foreach ($menu['sub'] as $item): ?>
                                    <li class="<?= $item['class'] ?>">
                                        <a href="<?= $item['link'] ?>"><?= $item['name'] ?></a>
                                        <span class="icon-thumbnail">
                                            <?php if (preg_match('#\b' . preg_quote('fas', '#') . '\b#i', $item['icon'])): ?>
                                                <i class="<?= $item['icon'] ?>"></i>
                                            <?php else: ?>
                                                <?= $item['icon'] ?>
                                            <?php endif; ?>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <div class="clearfix"></div>
    </div>
</nav>
