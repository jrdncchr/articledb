<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-11">
                <h2>Administration</h2>
                <hr />
                <div class="row">
                    <div class="col-lg-4 col-md-4" id="categoriesDiv">
                        <h3>
                            Categories 
                            <button type="button" id="showAddCtgBtn" class="btn btn-success pull-right" data-toggle="modal" data-target="#newCategoryModal"><i class="fa fa-plus"></i></button>
                        </h3>
                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="categories">
                                <thead>
                                    <tr>
                                        <th width="10%">ID</th>
                                        <th width="80%">Name</th>
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

<!-- New Category Modal -->
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