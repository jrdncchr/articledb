<div class="navbar navbar-inverse navbar-fixed-top navbar-custom" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url() ?>">Article Database &raquo;</a>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url() . "faqs"; ?>">FAQs</a></li>
                <li><a href="#">Suggestions</a></li>
            </ul>
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-user" style="margin-right: 10px;">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user->name ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url() . 'main' ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="<?php echo base_url() . 'articles' ?>"><i class="fa fa-files-o"></i> Articles</a></li>
                    <li><a href="<?php echo base_url() . 'main/profile' ?>"><i class="fa fa-user"></i> Profile</a></li>
                    <li class="divider"></li>
                    <?php if($user->type == 'admin') { ?>
                    <li><a href="<?php echo base_url() . 'admin' ?>"><i class="fa fa-gear"></i> Administration</a></li>
                    <?php } ?>
                    <li><a href="<?php echo base_url() . 'main/logout' ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>



