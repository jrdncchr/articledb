<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php echo $head ?>
    <body>
        <div id="wrap">
            <?php echo $nav ?>
            <div id="content">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <?php echo $quicklink ?>
                    </div>

                    <div class="col-lg-10 col-md-10">
                        <?php echo $content ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer ?>
        <?php echo $scripts ?>
    </body>
</html>