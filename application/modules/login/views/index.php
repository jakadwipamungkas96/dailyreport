<div class="row p-1">
    <div class="col">
        <nav class="navbar navbar-light header-login mt-4">
			<a class="navbar-brand text-bold text-white">E-REPORT PRODUKSI</a>
            <img src="<?= base_url() ?>assets/img/nindya-karya-logo.png" class="img-nindya">
        </nav>
    </div>
</div>

<div class="row p-5">
    <div class="col-lg-4">
        <div class="card card-nindya">
			<img src="<?= base_url() ?>assets/img/bumn-nindya.png" class="img-nindya-login p-2">
			<?php if(!empty($this->session->flashdata('alert')['msg_value'])) { ?>
            <?php 
              $msg_info = (!empty($this->session->flashdata('alert')['msg_value'])) ? '<div class="alert alert-danger" role="alert">' .$this->session->flashdata('alert')['msg_value']. '</div>' : '';
            ?>
            
            <div class="mb-2 error-login" id="" role="alert">
              <?= $msg_info ?>
            </div>
          <?php } ?>
            <div class="card-body">
                <form action="<?php echo base_url(); ?>login" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-block btn-success">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>
