<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <h2 id="readName"><?php echo $project->name ?></h2>
                <hr />
                <h3 id="readTitle"><?php echo $project->title ?></h3>
                <p>
                    <span id="readCategory"><?php echo $project->category ?></span>
                    <span class="pull-right"><i><?php echo $project->date ?></i></span>
                </p>
                <textarea id="readContent" class="form-control"><?php echo $project->content ?></textarea>
                <hr />
            </div>
            <div class="col-lg-2 col-md-2">
                <a href="<?php echo base_url() . 'main' ?>">&DoubleLeftArrow; Return to Dashboard</a>
                <div class="spacer"></div>
                <button class="btn btn-success btn-block" id="showUpdateBtn" data-toggle="modal" data-target="#updateModal"><i class="fa fa-edit"></i> <strong>Edit</strong></button>
                <button class="btn btn-danger btn-block" id="deleteBtn"><i class="fa fa-trash-o"></i> <strong>Delete</strong></button>
                <hr />
                <div class="btn-group btn-block">
                    <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-rocket"></i> <strong>Actions</strong>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url() . 'projects/viewFull/' . $project->id ?>" target="_blank">View Full</a></li>
                        <li><a href="<?php echo base_url() . 'projects/viewTitle/' . $project->id ?>" target="_blank">View Title Only</a></li>
                        <li><a href="<?php echo base_url() . 'projects/viewContent/' . $project->id ?>" target="_blank">View Content Only</a></li>
                        <li><a href="<?php echo base_url() . 'projects/viewSummary/' . $project->id ?>" target="_blank">View Summary</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Project</h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="message"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="acontent" class="form-control" style="height: 200px;"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="updateBtn" type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>