<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <a href="<?php echo base_url() . 'main' ?>">&DoubleLeftArrow; Return to Dashboard</a>
            </div>
            <div class="col-lg-6 col-md-6">
                <h2><?php echo $article->title ?></h2>
                <hr />
                <p>
                    <?php echo $article->category ?>
                    <span class="pull-right"><i><?php echo $article->date ?></i></span>
                </p>
                <pre><?php echo $article->content ?></pre>
            </div>
            <div class="col-lg-3 col-md-3">
            </div>
        </div>
    </div>
</div>