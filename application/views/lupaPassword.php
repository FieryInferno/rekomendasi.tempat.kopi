<!DOCTYPE html>
<html lang="en">
<head>
	<title>{title}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/main.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/js/main.js"></script>
</head>
<body>
	<div class="limiter">
        <div class="container-login100" style="background-image: url('<?= base_url(); ?>assets/images/bg-01.jpg');">
            <div class="container-fluid">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Rekomendasi Tempat Ngopi di Bandung <span class="lnr lnr-coffee-cup"></span></h1>
                        <p class="lead text-center">Temukan Tempat Ngopi Terbaik di Bandung</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?= base_url('lupaPassword'); ?>">
                                    <?php if ($this->session->pesan) echo $this->session->pesan; ?>
                                    <h6>Kesulitan untuk masuk?</h6>
                                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                                        <input class="input100" type="text" name="email" placeholder="Masukan Email" required>
                                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                                    </div>
                                    <div class="container-login100-form-btn m-t-32">
                                        <button class="login100-form-btn" type="submit">
                                            Kirim
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
	</div>
	<div id="dropDownSelect1"></div>
</body>
</html>