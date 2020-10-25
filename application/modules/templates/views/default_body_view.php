<body ng-app="nindya">
    <header class="navbar-fixed">
        <nav class="navbar navbar-light bg-light navbar-outline-header">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url() ?>assets/img/nindya-karya-logo.png" class="img-fluid img-nindya-dashboard"
                    alt="" loading="lazy">
			</a>
			
            <a type="button" class="btn btn-light" style="opacity: 1" href="<?= base_url("logout") ?>"><i class="fa fa-window-close text-danger" aria-hidden="true"></i> Logout</a>
        </nav>
        <nav class="navbar navbar-light bg-nindya">
            <ul class="nav pull-left">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="<?= base_url() ?>dashboard"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url() ?>report"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Report</a>
                </li>
			</ul>
			
            <small class="text-white mr-3"><i class="fa fa-address-card-o" aria-hidden="true"></i> Login as <?= $users['username'] ?></small>
        </nav>
	</header>
	
	<div style="min-height:100%;position:relative;">
		<?= $body ?>
	</div>
</body>
