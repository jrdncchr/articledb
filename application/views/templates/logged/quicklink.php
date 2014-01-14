<div class="well">
    <h4>Quick Links</h4>
    <hr />
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <ul class="list-unstyled">
                <li><a href="<?php echo base_url() . 'main' ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url() . 'articles' ?>"><i class="fa fa-files-o"></i> Articles</a></li>
                <li><a href="<?php echo base_url() . 'main/profile' ?>"><i class="fa fa-user"></i> Profile</a></li>
                <hr />
                <?php if ($user->type == 'admin') { ?>
                    <li><a href="<?php echo base_url() . 'admin' ?>"><i class="fa fa-gear"></i> Administration</a></li>
                <?php } ?>
                <li><a href="<?php echo base_url() . 'main/logout' ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
            </ul>
        </div>
    </div>
</div><!-- /well -->