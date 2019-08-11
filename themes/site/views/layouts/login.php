<!DOCTYPE html>
<html>
    <head>
        <?php $this->renderPartial('//layouts/sections/_head'); ?>
        <script src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/plugins/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            window.onload = function () {
                if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                    document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->getBaseUrl() ?>/pages/css/windows.chrome.fix.css" />'
            }
        </script>
    </head>
    <body class="bg-partnership">
        <div class="container">
            <?= $content ?>
        </div>
        <?php $this->renderPartial('//layouts/sections/_scripts'); ?>
    </body>
</html>