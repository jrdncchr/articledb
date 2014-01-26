<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <h2>Frequently Asked Questions</h2>
                <hr />
                <?php foreach ($faqs as $faq): ?>
                    <h3><?php echo $faq->question ?></h3>
                    <p><?php echo $faq->answer ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>