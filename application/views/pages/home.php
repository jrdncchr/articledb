<div class="container">
    <?php if ($message != null) { ?>
        <div class="alert alert-success">
            <?php echo $message; ?>
        </div>
    <?php } ?>
    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1>Authority Niche Links</h1>
        <p class="lead">
            Find hard creating new articles? Now with Article Database 
            available, you can now mix existing article to create a new article!
            Get Ready to be Amazed!
        </p>
        <p>
            <?php if (!isset($user)) { ?>
                <button class="btn btn-default" data-toggle="modal" data-target="#loginModal">Get Started Now!</button>
            <?php } else { ?>
                <a href="<?php echo base_url() . 'main'; ?>"><button class="btn btn-default">Go back to Main</button></a>
            <?php } ?>
        </p>
    </div>

</div> <!-- /container -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Login</h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="loginMessage"></div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="loginUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url() . 'register'; ?>"><button type="button" class="btn btn-primary pull-left">Register</button></a>
                <button type="button" id="loginBtn" class="btn btn-success">Login</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->