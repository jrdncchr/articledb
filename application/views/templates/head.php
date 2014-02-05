<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?></title>
    <meta name="description" content="<?php echo $description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'normalize.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'bootstrap-spacelab.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'jquery-ui-1.10.3.custom.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'jquery.dataTables.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'jquery.dataTables_themeroller.css'; ?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . CSS . 'style.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . FONT . 'css/font-awesome.min.css'; ?>">

    <?php foreach ($css as $c): ?>
        <link rel="stylesheet" href="<?php echo base_url() . CSS . $c; ?>">
    <?php endforeach; ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url() . JS . 'modernizr-2.6.2.min.js'; ?>"></script>
</head>