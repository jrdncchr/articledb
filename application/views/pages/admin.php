<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-11">
                <h2>Administration</h2>
                <hr />
                <div class="row">
                    <div class="col-lg-12 col-md-12" id="categoriesDiv">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <h4 class="panel-title">
                                            <i class="fa fa-bars"></i> Categories
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h3>
                                            Categories 
                                            <button type="button" id="showAddCtgBtn" class="btn btn-success pull-right" data-toggle="modal" data-target="#newCategoryModal"><i class="fa fa-plus"></i> Add</button>
                                        </h3>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 10px;"></div>
                <div class="row">
                    <div class="col-lg-12 col-md-12" id="usersDiv">
                        <div class="panel-group" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                        <h4 class="panel-title">
                                            <i class="fa fa-users"></i> Users
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h3>
                                            Users 
                                        </h3>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 10px;"></div>
                <div class="row">
                    <div class="col-lg-12 col-md-12" id="blogsDiv">
                        <div class="panel-group" id="accordion3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion3" href="#collapseThree">
                                        <h4 class="panel-title">
                                            <i class="fa fa-book"></i> Blogs
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h3>
                                            Blogs 
                                            <button type="button" id="addBlogBtn" class="btn btn-success pull-right" data-toggle="modal" data-target="#blogModal"><i class="fa fa-plus"></i> Add</button>
                                        </h3>
                                        <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="blogs">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">ID</th>
                                                        <th width="80%">URL</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 10px"></div>
                <div class="row">
                    <div class="col-lg-12 col-md-12" id="categoriesDiv">
                        <div class="panel-group" id="accordion4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion4" href="#collapseFour">
                                        <h4 class="panel-title">
                                            <i class="fa fa-dot-circle-o"></i> Title Templates
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h3>
                                            Title Templates 
                                            <button type="button" id="addTitleBtn" class="btn btn-success pull-right" data-toggle="modal" data-target="#titleModal"><i class="fa fa-plus"></i> Add</button>
                                        </h3>
                                        <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="titles">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">ID</th>
                                                        <th width="80%">Title</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 10px"></div>
                <div class="row">
                    <div class="col-lg-12 col-md-12" id="categoriesDiv">
                        <div class="panel-group" id="accordion5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion5" href="#collapseFive">
                                        <h4 class="panel-title">
                                            <i class="fa fa-question-circle"></i> FAQs
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h3>
                                            FAQs 
                                            <button type="button" id="addFaqBtn" class="btn btn-success pull-right" data-toggle="modal" data-target="#faqModal"><i class="fa fa-plus"></i> Add</button>
                                        </h3>
                                        <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="faqs">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">ID</th>
                                                        <th width="80%">Question</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 10px"></div>
            </div>
        </div>
    </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <form role="form">
                    <div class="form-group">
                        <label for="title">URL</label>
                        <input type="text" class="form-control" id="nbUrl" placeholder="Blog URL">
                    </div>
                    <div class="form-group">
                        <label for="title">Username</label>
                        <input type="text" class="form-control" id="nbUsername" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="title">Password</label>
                        <input type="password" class="form-control" id="nbPassword" placeholder="Password">
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