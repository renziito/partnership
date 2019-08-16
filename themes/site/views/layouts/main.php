<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <?php $this->renderPartial('//layouts/sections/_head'); ?>
        <script src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/plugins/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    </head>
    <body class="fixed-header menu-pin menu-behind menu-pin">
        <?= $this->renderPartial('//layouts/sections/_navbar'); ?>
        <div class="page-container ">
            <?php $this->renderPartial('//layouts/sections/_header'); ?>

            <div class="page-content-wrapper ">
                <div class="content ">
                    <div class="jumbotron" data-pages="parallax">
                        <div class=" container-fluid  container-fixed-lg sm-p-l-0 sm-p-r-0">
                            <div class="inner">
                                <?php if ($this->breadcrumbs) : ?>
                                    <?php $this->renderPartial('//layouts/sections/_breadcrumb', ['breadcrumbs' => $this->breadcrumbs]); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid container-fixed-lg sm-p-l-10 sm-p-r-10">
                        <?= $content ?>
                    </div>
                </div>

                <div class=" container-fluid  container-fixed-lg footer">
                    <div class="copyright sm-text-center">
                        <p class="small no-margin pull-right sm-pull-reset">
                            <span class="hint-text">Copyright &copy; <?= date('Y') ?> </span>
                            <span class="font-montserrat"><?= $_SERVER['HTTP_HOST'] ?></span>.
                            <span class="hint-text">All rights reserved. </span>
                            <!--<span class="hint-text">Made with Love <i class="fas fa-heart"></i></span>-->
                        </p>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->renderPartial('//layouts/sections/_scripts'); ?>
        <script>
            $(document).ready(function () {
                var Global = {
                    module: '<?= ($this->module) ? $this->module->id : '' ?>',
                    controller: '<?= $this->id ?>',
                    action: '<?= $this->action->id ?>',
                    absoluteUrl: '<?= Yii::app()->getBaseUrl(true) ?>',
                    baseUrl: '<?= Yii::app()->baseUrl ?>',
                };

                var select = $('.fa-select option');
                select.each(function (i, elem) {
                    var val = elem.text;
                    elem.innerHTML = '&' + val;
                });
                $(".select2").select2({
                    width: '100%'
                });
            });
            

            $('.summernote').summernote({
                height: 150,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
            });

            $('.multi-select').multiSelect();

            $('.searchable').multiSelect({
                selectableHeader: "<input type='text' class='form-control' autocomplete='off'>",
                selectionHeader: "<input type='text' class='form-control' autocomplete='off'>",
                afterInit: function (ms) {
                    var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                },
                afterSelect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });

            $('.action-select').on('click', function () {
                var id = $(this).data('id');
                var action = $(this).data('action');
                $('#' + id).multiSelect(action);
                return false;
            });
        </script>

    </body>
</html>