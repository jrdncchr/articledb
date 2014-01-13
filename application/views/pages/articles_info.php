<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <h2 id="readTitle"><?php echo $article->title ?></h2>
                <hr />
                <p>
                    <span id="readCategory"><?php echo $article->category ?></span>
                    <span class="pull-right"><i><?php echo $article->date ?></i></span>
                </p>
                <textarea id="readContent" class="form-control"><?php echo $article->content ?></textarea>
                <hr />
            </div>
            <div class="col-lg-2 col-md-2">
                <a href="<?php echo base_url() . 'main/articles' ?>">&DoubleLeftArrow; Go to Articles</a>
                <div class="spacer"></div>
                <button class="btn btn-success btn-block" id="showUpdateBtn" data-toggle="modal" data-target="#updateModal"><i class="fa fa-edit"></i> <strong>Edit</strong></button>
                <button class="btn btn-danger btn-block" id="deleteBtn"><i class="fa fa-trash-o"></i> <strong>Delete</strong></button>

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
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Article</h4>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="message"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control">
                            <option value="">Select a category</option>
                            <option value="Variety">Variety</option>
                            <option value="Fruits">Fruits</option>
                        </select>
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