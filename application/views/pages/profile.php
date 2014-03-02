<div class='row'>
    <div class='col-lg-8'>
        <h2><i class='fa fa-user'></i> Profile</h2>
        <hr />
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="profileTabs">
            <li class="active"><a href="#basic" data-toggle="tab" id="basicTab">Basic Info</a></li>
            <li><a href="#password" data-toggle="tab" id="testimonialsTab">Password</a></li>
            <li><a href="#tbsInfo" data-toggle="tab" id="advanceTab">TBS Info</a></li>
        </ul>

        <div class="tab-content">
            <!-- Basic Info Div -->
            <div class="tab-pane active" id="basic">
                <br />
                <div id="basicMessage"></div>
                <div class="col-lg-12">
                    <div class="form-horizontal">
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

                    </div>
                </div>
            </div>

            <div class="tab-pane" id="password">
                <br />
                <div class="alert alert-info"><i class='fa fa-info'></i> Change Password; new password must be at least 5 characters.</div>
                <div class="alert-danger" id="changePasswordMessage"></div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="oldPassword" class="col-sm-3 control-label">Current Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="oldPassword" placeholder="Current Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newPassword" class="col-sm-3 control-label">New Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="newPassword" placeholder="New Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword" class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" />
                        </div>
                    </div>
                    <button type="button" id="changePasswordBtn" class="btn btn-success pull-right">Change Password</button>
                </form>
            </div>

            <div class="tab-pane" id="tbsInfo">
                <br />
                <div class="alert alert-info"><i class='fa fa-info'></i> If you have an account in the TBS, put your details here to enable the spin feature.</div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="tbsun" class="col-sm-3 control-label">TBS Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tbsun" value="<?php echo $user->tbsun ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tbspw" class="col-sm-3 control-label">TBS Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="tbspw" value="<?php echo $user->tbspw ?>">
                        </div>
                    </div>
                    <button type="button" id="saveTBSBtn" class="btn btn-success pull-right">Save Details</button>
                </form>
            </div>
        </div>
    </div>
</div>