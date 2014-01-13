<div class="row">
    <div class="col-lg-10 col-md-10">
        <div class="btn-group">
            <button class="btn btn-success" data-toggle="modal" data-target="#newArticleModal"><i class="fa fa-pencil"></i> <strong>Add Article</strong></button>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flash"></i> <strong>Generate</strong>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#" data-toggle="modal" data-target="#genTitleModal">Generate Titles</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#genArticleModal">Generate Articles</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#genABPModal">Generate Articles By Project</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-md-5">
        <h2>Projects</h2>
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="projects">
                <thead>
                    <tr>
                        <th width="20%">ID</th>
                        <th width="50%">Project Title</th>
                        <th width="30%">Action</th>
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

    <div class="col-lg-6 col-md-6">
        <h2>Articles</h2>
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="articles">
                <thead>
                    <tr>
                        <th width="20%">ID</th>
                        <th width="50%">Title</th>
                        <th width="30%">Category</th>
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

<!-- New Article Modal -->
<div class="modal fade" id="newArticleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> New Article</h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="naMessage"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="naTitle" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="naCategory" class="form-control">
                            <option value="">Select a category</option>
                            <option value="Variety">Variety</option>
                            <option value="Fruits">Fruits</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="naContent" class="form-control" style="height: 200px;"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="naBtn" type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Generate Title Modal -->
<div class="modal fade" id="genTitleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-flash"></i> Generate Title</h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="gtMessage"></div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gtKeyword" placeholder="Keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>Category 1</option>
                                <option>Category 2</option>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary pull-right">Generate Title</button>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Generated Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gtGeneratedTitle" placeholder="Output">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Generate Article Modal -->
<div class="modal fade" id="genArticleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-flash"></i> Generate Article</h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="gaMessage"></div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gaKeyword" placeholder="Keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>Category 1</option>
                                <option>Category 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Titles to Display</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="gaNoTitle">
                        </div>
                        <label for="category" class="col-sm-3 control-label">Articles to Mix</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="gaArticlesToMix">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Paragraphs</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="gaNoParagraphs">
                        </div>
                        <label for="category" class="col-sm-3 control-label">Sentence/Paragraph</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="gaNoOfSP">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Generate</button>
            </div>
        </div>
    </div>
</div>

<!-- Generate Article Modal -->
<div class="modal fade" id="genABPModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-flash"></i> Generate Article By Project</h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="gabpMessage"></div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Project Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="gabpTitle" placeholder="Project Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keyword" class="col-sm-3 control-label">Keyword</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="gabpKeyword" placeholder="Keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-9">
                            <select class="form-control">
                                <option>Category 1</option>
                                <option>Category 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Articles to Mix</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="gabpArticlesToMix">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Paragraphs</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="gabpNoParagraphs">
                        </div>
                        <label for="category" class="col-sm-3 control-label">Sentence/Paragraph</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="gabpNoOfSP">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Generate</button>
            </div>
        </div>
    </div>
</div>