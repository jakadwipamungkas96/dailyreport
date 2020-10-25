	<footer class="main-footer">
  		<div class="pull-right">
  			<img src="<?= base_url() ?>assets/img/bumn-nindya.png" style="width: 20%;" class="pull-right">
  		</div>
    	<div class="pull-left">
    		<small>Design by <a href="#">Jaka Dwi Pamungkas</a> &copy; <?php echo date("Y") ?>. All rights reserved.</small>
        </div>
        <div class="clearfix">&nbsp;</div>   
	</footer>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url('resources/bootstrap/js/bootstrap.min.js') ?>"></script>
	<?php
        if(isset($js) && count($js) > 0){
            foreach ($js as $key => $vjs) {
                echo '<script type="text/javascript" src="'.(is_int($key) ? base_url($vjs) : $vjs).'"></script>';
            }
        }

        if(isset($css) && count($css) > 0){
            foreach ($css as $vcss) {
                echo '<link rel="stylesheet" type="text/css" href="'.base_url($vcss).'">';
            }
        }
    ?>
</html>
