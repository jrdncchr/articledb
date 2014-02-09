<div class="row">
    <div class="col-lg-10">
        <div id="mainMessage" class="alert-success"></div>
    </div>
</div>
<div class="row">
    <div class="col-lg-11 col-md-11">

        <div class="btn-group">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flash"></i> <strong>Generate</strong>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#" data-toggle="modal" data-target="#genTitleModal">Generate Titles</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#genArticleModal">Generate Articles</a></li>
                    <li><a href="#" id="showGABPForm" data-toggle="modal" data-target="#genABPModal">Generate Articles By Project</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <strong>Actions</strong>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a style="cursor: pointer" data-toggle="modal" data-target="#blogModal">Add a Blog</a></li>
                    <hr />
                    <li><a style="cursor: pointer;" id="spinLink">Spin using TBS</a></li>
                    <li><a style="cursor: pointer;" id="nonSpinLink">Non Spin</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#postModal">Post on WordPress Blogs</a></li>
                </ul>
            </div>
        </div>
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-pencil"></i> <strong>Add Articles</strong>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#newArticleModal">Add Manually</a></li>
                <li><a href="#" data-toggle="modal" data-target="#newArticleMultipleModal">Multiple Add By File Read</a></li>
            </ul>
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
                        <th width="80%">Project Name</th>
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

<div class="modal fade" id="newArticleMultipleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Add Article - Multiple By File Read</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" id="namMessage"><i class="fa fa-info"></i> 
                    Select all the files(.txt) to be added. Note that the first line will be the title.
                </div>
                <div class="form-group">
                    <label for="files">Select files</label>
                    <input type="file" id="namInput" multiple />
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="namCategory" class="form-control">
                        <option value="">Select a category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button id="namClearBtn" type="button" class="btn btn-danger pull-left">Clear</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="namBtn" type="button" class="btn btn-success">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- New Article Modal -->
<div class="modal fade" id="newArticleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> New Article - Manually</h4>
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
                <button id="naBtn" type="button" class="btn btn-success">Add</button>
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
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input id="gtTemplate" type="checkbox"> Use Templates <br />
                            <input id="gtCheck" type="checkbox" checked> Spin results using TBS spun format
                        </div>
                        <div class="col-sm-6">
                            <br />
                            <button type="button" id="gtBtn" class="btn btn-primary pull-right">Generate Title</button>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr />

                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Generated Title(s)</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="gtGeneratedTitles"></textarea>
                            <a href="<?php echo base_url() . 'projects/showPreview'; ?>" target="preview" id="gtTitlePreview" class="btn btn-default btn-xs pull-right"><i class='fa fa-eye'></i> Preview</a>
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
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
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
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class='col-sm-4'>
                            <h5><small>Max</small></h5>
                            <select id="gaPMax" class="form-control">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Sentences / Paragraph</label>
                        <div class="col-sm-4">
                            <h5><small>Min</small></h5>
                            <select id="gaSPMin" class="form-control">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class='col-sm-4'>
                            <h5><small>Max</small></h5>
                            <select id="gaSPMax" class="form-control">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addCode" class="col-sm-3 control-label">Add Text/Code</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="gaAddedCode" placeholder="This text/code will be inserted in a random location in the generated article."></textarea>
                        </div>
                    </div>
                </form>
                <form id='genArticleFormOutput' style='display:none;' class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" id='gaSaveBtn' class="btn btn-success pull-left"><i class="fa fa-save"></i> Save</button>
                            <div class="checkbox col-sm-5">
                                <label>
                                    <input style="margin-left: 10px;" id="gaPostCheck" type="checkbox" /> Post on wordpress blog
                                </label>
                            </div>
                            <div class="btn-group pull-right">
                                <a href="<?php echo base_url() . 'projects/showPreview'; ?>" target="preview" id="gaPreviewBtn" class="btn btn-default"><i class='fa fa-eye'></i> Preview</a>
                                <button type="button" id="gaRefreshBtn" class="btn btn-primary"><i class='fa fa-refresh'></i> Generate Again</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class='spacer-sm'></div>
                        </div>
                    </div>
                    <div class="row" id="gaPostDiv" style="display: none;">
                        <div class="form-group">
                            <label for="output" class="col-sm-3 control-label">How many blogs?</label>
                            <div class="col-sm-5">
                                <select id="gaNoBlogs" class="form-control">
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="output" class="col-sm-3 control-label">Type of Blogs 
                            </label>
                            <div class="checkbox col-sm-2">
                                <label>
                                    <input style="margin-left: 10px;" id="gaAdmin" type="checkbox" checked /> Admin 
                                </label>
                            </div>
                            <div class="checkbox col-sm-2">
                                <label>
                                    <input style="margin-left: 10px;" id="gaPublic" type="checkbox"> Public
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gaName" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Generated Title(s)</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="gaGeneratedTitles" style="min-height: 80px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Generated Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="gaGeneratedContents" style="min-height: 150px;"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div id="gaCheckDiv" class="pull-left">
                            <input id="gaCheck" type="checkbox" checked> Spin results using TBS spun format
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id='gaGenerateBtn' class="btn btn-primary pull-right">Generate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Generate Article By Project Modal -->
<div class="modal fade" id="genABPModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-flash"></i> Generate Article By Project</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" id="gabpMessage"><i class="fa fa-info"></i> Keyword and Category can't have a value at the same time.</div>
                <form id='gabpArticleForm' class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gabpKeyword" placeholder="Keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" id='gabpCategory'>
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
                            <select id="gabpNoTitles" class="form-control">
                                <?php for ($i = 1; $i <= 30; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="articlesToMix" class="col-sm-3 control-label">Articles to Mix</label>
                        <div class="col-sm-3">
                            <select id="gabpNoArticlesToMix" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Paragraphs</label>
                        <div class="col-sm-4">
                            <h5><small>Min</small></h5>
                            <select id="gabpPMin" class="form-control">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class='col-sm-4'>
                            <h5><small>Max</small></h5>
                            <select id="gabpPMax" class="form-control">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Sentences / Paragraph</label>
                        <div class="col-sm-4">
                            <h5><small>Min</small></h5>
                            <select id="gabpSPMin" class="form-control">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class='col-sm-4'>
                            <h5><small>Max</small></h5>
                            <select id="gabpSPMax" class="form-control">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addCode" class="col-sm-3 control-label">Add Text/Code</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="gabpAddedCode" placeholder="This text/code will be inserted in a random location in the generated article."></textarea>
                        </div>
                    </div>
                </form>
                <form id='gabpArticleFormOutput' style='display:none;' class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" id='gabpSaveBtn' class="btn btn-success pull-left"><i class="fa fa-save"></i> Save</button>
                            <div class="checkbox col-sm-5">
                                <label>
                                    <input style="margin-left: 10px;" id="gabpPostCheck" type="checkbox" /> Post on wordpress blog
                                </label>
                            </div>
                            <div class="btn-group pull-right">
                                <a href="<?php echo base_url() . 'projects/showPreview'; ?>" target="preview" id="gabpPreviewBtn" class="btn btn-default"><i class='fa fa-eye'></i> Preview</a>
                                <button type="button" id="gabpRefreshBtn" class="btn btn-primary"><i class='fa fa-refresh'></i> Generate Again</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class='spacer-sm'></div>
                        </div>
                    </div>
                    <div class="row" id="gabpPostDiv" style="display: none;">
                        <div class="form-group">
                            <label for="output" class="col-sm-3 control-label">How many blogs?</label>
                            <div class="col-sm-5">
                                <select id="gabpNoBlogs" class="form-control">
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="output" class="col-sm-3 control-label">Type of Blogs 
                            </label>
                            <div class="checkbox col-sm-2">
                                <label>
                                    <input style="margin-left: 10px;" id="gabpAdmin" type="checkbox" checked /> Admin 
                                </label>
                            </div>
                            <div class="checkbox col-sm-2">
                                <label>
                                    <input style="margin-left: 10px;" id="gabpPublic" type="checkbox"> Public
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gabpName" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Generated Title(s)</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="gabpGeneratedTitles"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Generated Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="gabpGeneratedContents" style="min-height: 200px;"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div id="gabpCheckDiv" class="pull-left">
                            <input id="gabpCheck" type="checkbox" checked /> Spin results using TBS spun format
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id='gabpGenerateBtn' class="btn btn-primary pull-right">Generate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="blogModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Add a Blog</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="alert alert-info" id="abMessage"><i class="fa fa-info"></i> 
                        Your blog will be added to the public blogs after verification.
                    </div>
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">URL</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="abUrl" placeholder="http://www.myblog.info/"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="abUsername" placeholder="admin" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="abPassword" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="abSubmitBtn" type="button" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Post Modal -->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Post on WordPress Blogs</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" id="pmMessage"><i class="fa fa-info"></i> Post this project on a random WordPress blog.</div>
                <div class="row">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="output" class="col-sm-3 control-label">How many blogs?</label>
                            <div class="col-sm-8">
                                <select id="pmNoBlogs" class="form-control">
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="output" class="col-sm-3 control-label">How many blogs?</label>
                            <div class="col-sm-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="pmAdmin"> Admin
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="pmPublic"> Public
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pmName" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Title(s)</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="pmTitles"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="pmContents" style="min-height: 150px;"></textarea>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button id="pmSaveBtn" type="button" class="btn btn-success pull-left">Save to Project</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="pmPostBtn" type="button" class="btn btn-primary">Post</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Post Modal -->
<div class="modal fade" id="spinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="smHeadTitle"><i class="fa fa-spinner"></i> Spin using TBS</h4>
            </div>
            <div class="modal-body">
                <div class="alert-info" id="smMessage"></div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Title(s)</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="smTitles"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="output" class="col-sm-2 control-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="smContents" style="min-height: 150px;"></textarea>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="spinLinkBtn" type="button" class="btn btn-success" style="display: none;">Spin Using TBS</button>
                    <button id="nonSpinLinkBtn" type="button" class="btn btn-success" style="display: none;">Non Spin</button>
                </div>
            </div>
        </div>
    </div>
</div>