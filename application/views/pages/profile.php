<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-11">
                <h2>Profile</h2>
                <hr />
                <div class="col-lg-6 col-md-6">
                    <div class="alert-danger" id="infoMessage"></div>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" value="<?php echo $user->username ?>" readonly="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" value="<?php echo $user->name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" value="<?php echo $user->email ?>">
                            </div>
                        </div>
                        <button type="button" id="saveBtn" class="btn btn-success pull-right">Save Changes</button>
                    </form>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="alert-danger" id="changePasswordMessage"></div>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="oldPassword" class="col-sm-2 control-label">Current Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="oldPassword" placeholder="Current Password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newPassword" class="col-sm-2 control-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="newPassword" placeholder="New Password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword" class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" />
                            </div>
                        </div>
                        <button type="button" id="changePasswordBtn" class="btn btn-success pull-right">Change Password</button>
                    </form>
                    <div class="clearfix"></div>
                    <hr />
                </div>
                <div class="col-lg-3 col-md-3">
                </div>
            </div>
        </div>
    </div>
</div>