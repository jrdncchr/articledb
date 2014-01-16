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
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
                            <?php endforeach; ?>
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
                <div class="alert alert-info" id="gtMessage"><i class="fa fa-info"></i> Keyword and Category can't have a value at the same time.</div>
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
                            <select id="gtCategory" class="form-control">
                                <option value="">Select a category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">No. Titles</label>
                        <div class="col-sm-2">
                            <select id="gtNoTitles" class="form-control">
                                <?php for ($i = 1; $i <= 30; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button type="button" id="gtBtn" class="btn btn-primary pull-right">Generate Title</button>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Generated Title(s)</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="gtGeneratedTitles"></textarea>
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
                <div class="alert alert-info" id="gaMessage"><i class="fa fa-info"></i> Keyword and Category can't have a value at the same time.</div>
                <form id='genArticleForm' class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gaKeyword" placeholder="Keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" id='gaCategory'>
                                <option value="">Select a category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="titles" class="col-sm-3 control-label">Titles to Display</label>
                        <div class="col-sm-3">
                            <select id="gaNoTitles" class="form-control">
                                <?php for ($i = 1; $i <= 30; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="articles" class="col-sm-3 control-label">Articles to Mix</label>
                        <div class="col-sm-3">
                            <select id="gaNoArticlesToMix" class="form-control">
                                <?php for ($i = 2; $i <= 15; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Paragraphs</label>
                        <div class="col-sm-4">
                            <h5><small>Min</small></h5>
                            <select id="gaPMin" class="form-control">
                                <?php for ($i = 3; $i <= 5; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class='col-sm-4'>
                            <h5><small>Max</small></h5>
                            <select id="gaPMax" class="form-control">
                                <?php for ($i = 5; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </form>
                <form id='genArticleFormOutput' style='display:none;' class="form-horizontal" role="form">
                    <button type="button" id="gaRefreshBtn" class="btn btn-primary pull-right"><i class='fa fa-refresh'></i> Generate Again</button>
                    <div class="clearfix"></div>
                    <div class='spacer-sm'></div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Generated Title(s)</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="gaGeneratedTitles"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Generated Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="gaGeneratedContents"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id='gaGenerateBtn' class="btn btn-primary pull-right">Generate</button>
                <button type="button" style='display: none;' id='gaSaveBtn' class="btn btn-success pull-right">Save</button>
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
                                <option value="">Select a category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
                                <?php endforeach; ?>
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