<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url() . JS . 'jquery-1.9.1.js' ?>"><\/script>')</script>
<script src="<?php echo base_url() . JS . "bootstrap.min.js"; ?>"></script>
<script src="<?php echo base_url() . JS . "jquery-ui-1.10.3.min.js"; ?>"></script>
<script src="<?php echo base_url() . JS . "jquery.dataTables.min.js"; ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.min.js"></script>
<script src="<?php echo base_url() . JS . "all.js"; ?>"></script>
<?php foreach ($js as $j): ?>
    <script src="<?php echo base_url() . JS . $j ?>"></script>
<?php endforeach; ?>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    //Google Analytics Code Here
</script>