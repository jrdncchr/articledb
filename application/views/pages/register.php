<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2"></div>
            <div class="col-lg-8 col-md-8">
                <h2>Registration</h2>
                <hr />
                <?php if (validation_errors() != null) { ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>
                <div class="alert alert-info" id="regMessage">
                    <i class="fa fa-info-circle"></i> Please fill up all fields.
                </div>

                <?php echo form_open(base_url() . 'register', array('class' => 'form-horizontal', 'role' => 'form', 'onsubmit' => 'return validate();')); ?>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" id="regUsername" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="regPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="confirm" id="regConfirmPassword" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="regName" placeholder="Full Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="regEmail" placeholder="Email">
                    </div>
                </div>

                <hr />
                <button type="button" id="cancelBtn" class="btn btn-danger pull-left">Cancel</button>
                <button class="btn btn-success pull-right">Finish</button>
                </form>
            </div>
            <div class="col-lg-2 col-md-2"></div>
        </div>
    </div>
</div>