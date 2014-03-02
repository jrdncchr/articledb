<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <h2>Administration</h2>
                <hr />
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="adminTabs">
                    <li class="active"><a href="#categoriesTab" data-toggle="tab">Categories</a></li>
                    <li><a href="#usersTab" data-toggle="tab">Users</a></li>
                    <li><a href="#blogsTab" data-toggle="tab">Blogs</a></li>
                    <li><a href="#titleTemplatesTab" data-toggle="tab">Title Templates</a></li>
                    <li><a href="#faqsTab" data-toggle="tab">Faqs</a></li>
                    <li><a href="#othersTab" data-toggle="tab">Others</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="categoriesTab">
                        <h3 class="col-sm-12 text-center">Categories <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#categoryModal"><i class="fa fa-plus"></i> Add</button></h3>

                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="categories">
                                <thead>
                                    <tr>
                                        <th width="10%">ID</th>
                                        <th width="80%">Name</th>
                                        <th width="10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="dataTables_empty">Loading data from server</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="usersTab">
                        <h3 class="text-center"> Users </h3>
                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="users">
                                <thead>
                                    <tr>
                                        <th width="20%">Username</th>
                                        <th width="50%">Name</th>
                                        <th width="30%">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="dataTables_empty">Loading data from server</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="blogsTab">
                        <h3 class="col-sm-12 text-center">Blogs <button type="button" id="addBlogBtn" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#blogModal"><i class="fa fa-plus"></i> Add</button></h3>
                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="blogs">
                                <thead>
                                    <tr>
                                        <th width="10%">ID</th>
                                        <th width="40%">URL</th>
                                        <th width="15%">Username</th>
                                        <th width="15%">Type</th>
                                        <th width="15%">Status</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="dataTables_empty">Loading data from server</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="titleTemplatesTab">
                        <h3 class="col-sm-12 text-center">Title Templates <button type="button" id="addTitleBtn" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#titleModal"><i class="fa fa-plus"></i> Add</button></h3>
                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="titles">
                                <thead>
                                    <tr>
                                        <th width="10%">ID</th>
                                        <th width="80%">Title</th>
                                        <th width="10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="dataTables_empty">Loading data from server</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="faqsTab">
                        <h3 class="col-sm-12 text-center">FAQs <button type="button" id="addFaqBtn" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#faqModal"><i class="fa fa-plus"></i> Add</button></h3>
                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="faqs">
                                <thead>
                                    <tr>
                                        <th width="60%">ID</th>
                                        <th width="20%">Question</th>
                                        <th width="20%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="dataTables_empty">Loading data from server</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="othersTab">
                        <h3 class="col-sm-12 text-center">Other Configurations </h3>
                        <form role="form">
                            <div class="form-group">
                                <label for="main"><i class="fa fa-code"></i> Main Content (Below the Tracker)</label>
                                <textarea type="email" class="form-control" id="content1Input" style="min-height: 150px;"><?php echo $content1->input; ?></textarea>
                                <input type="text" id="content1Name" class="hidden" value="<?php echo $content1->name; ?>" />
                            </div>
                            <button type="button" class="btn btn-sm btn-success" id="content1SaveBtn"><i class="fa fa-save"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> <span id="ncTitle">New Category</span></h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="ncMessage"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="ncName" placeholder="Category Name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="ncBtn" type="button" class="btn btn-primary">Add</button>
                <button id="editCtgBtn" type="button" class="btn btn-primary" style="display: none;">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Blog Modal -->
<div class="modal fade" id="blogModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> <span id="nbHead">New Blog</span></h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="nbMessage"></div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">URL</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nbUrl" placeholder="Blog URL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nbUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nbPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="nbType">
                                <option value="public">Public</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="nbStatus">
                                <option value="pending">Pending</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="nbBtn" type="button" class="btn btn-primary">Add</button>
                <button id="ebBtn" type="button" class="btn btn-primary" style="display: none;">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Title Modal -->
<div class="modal fade" id="titleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> <span id="ntHead">New Title Template</span></h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="ntMessage"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="ntTitle" placeholder="Title">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="ntBtn" type="button" class="btn btn-primary">Add</button>
                <button id="etBtn" type="button" class="btn btn-primary" style="display: none;">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Title Modal -->
<div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> <span id="nfHead">New FAQ</span></h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="nfMessage"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="title">Question</label>
                        <input type="text" class="form-control" id="nfQuestion" placeholder="Question">
                    </div>
                    <div class="form-group">
                        <label for="title">Answer</label>
                        <textarea class="form-control" id="nfAnswer" placeholder="Answer"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="nfBtn" type="button" class="btn btn-primary">Add</button>
                <button id="efBtn" type="button" class="btn btn-primary" style="display: none;">Save</button>
            </div>
        </div>
    </div>
</div>