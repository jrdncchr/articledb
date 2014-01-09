<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?></title>
    <meta name="description" content="<?php echo $description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url() . IMAGES . 'favicon.ico'; ?>" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Cuprum" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Bree+Serif" />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'style.css'; ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'autosuggest_inquisitor.css'; ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'fancybox.css'; ?>" media="screen"  />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'jquery-ui-1.8.16.custom.css'; ?>" media="screen"  />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'fullcalendar.css'; ?>" media="screen"  />
    <link rel="stylesheet" href="<?php echo base_url() . LIB . 'elfinder/css/elfinder.css'; ?>" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url() . LIB . 'editor/jquery.wysiwyg.css'; ?>" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url() . LIB . 'editor/default.css'; ?>" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'tipTip.css'; ?>" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'chosen.css'; ?>" media="screen"  />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'colorpicker.css'; ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'tables.css'; ?>" media="screen"  />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'jquery.jgrowl.css'; ?>" media="screen"  />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'sweet-tooltip.css'; ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'jquery.jscrollpane.css'; ?>" />


    <?php foreach ($css as $c): ?>
        <link rel="stylesheet" href="<?php echo base_url() . CSS . $c; ?>">
    <?php endforeach; ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="<?php echo base_url() . LIB . 'jquery-ui-1.8.16.custom.min.js'; ?>"></script>

    <script type="text/javascript" src="<?php echo base_url() . LIB . 'ddaccordion.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'jquery.flot.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'jquery.flot.pie.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'jquery.flot.orderBars.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'jquery.flot.resize.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'graphtable.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'fancybox/fancybox.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'fullcalendar.min.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'elfinder/js/elfinder.min.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . LIB . 'editor/jquery.wysiwyg.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . LIB . 'editor/wysiwyg.image.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . LIB . 'editor/default.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . LIB . 'editor/wysiwyg.link.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . LIB . 'editor/wysiwyg.table.js'; ?>" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'player/jquery-jplayer/jquery.jplayer.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'jquery.tipTip.minified.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'forms.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'chosen.jquery.min.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'autoresize.jquery.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'colorpicker.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'validation.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'jquery.jgrowl_minimized.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'slidernav-min.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'jquery.alerts.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . LIB . 'formToWizard.js'; ?>"></script><script>$(document).ready(function() {
            $("#SignupForm").formToWizard({submitButton: 'SaveAccount'});
        });</script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'AutoSuggest_2.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'jquery.mousewheel.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'jquery.jscrollpane.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'tabs.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'hover.zoom.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . LIB . 'jquery.reveal.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'jquery.tzCheckbox.js'; ?>"></script>
    <script src="<?php echo base_url() . LIB . 'cookie.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . LIB . 'core.js'; ?>" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url() . LIB . 'functions.js'; ?>"></script>

</head>