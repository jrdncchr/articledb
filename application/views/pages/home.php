<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <h2>Articles</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-hover">
                            <?php foreach ($articles as $a): ?>
                                <tr>
                                    <td><?php echo $a->id ?></td>
                                    <td><?php echo $a->title ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</button> 
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3 style="text-align: center">Actions</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <button class="btn btn-success btn-lg btn-block"><i class="fa fa-pencil"></i> <strong>Add Article</strong></button>
                        <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-star-o"></i> <strong>Generate Titles</strong></button>
                        <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-smile-o"></i> <strong>Generate Articles</strong></button>
                        <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-flash"></i> <strong>Generate Articles By Project</strong></button>
                    </div>
                </div>          
            </div>
        </div>
    </div>
</div>