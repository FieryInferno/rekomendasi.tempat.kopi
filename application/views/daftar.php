<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar</title>
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
                        <div class="row">
                            <div class="col-11">
                                <h1 class="display-5 text-center">Join Rekomendasi Tempat Ngopi di Bandung</h1>
                                <p class="lead text-center">Untuk mendapatkan rekomendasi, kamu harus mendaftarkan account terlebih dahulu. Isilah setiap data dengan benar, maka akmu akan mendapatkan rekomendasi yang baik, selamat mencoba!</p>
                            </div>
                            <div class="col-1">
                                <h1 class="display-1 text-center"><span class="lnr lnr-coffee-cup"></span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form class="login100-form validate-form" method="post" action="daftar">
                            <?php if ($this->session->pesan) echo $this->session->pesan; ?>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail" placeholder="Username" required name="username" value="<?= set_value('username'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail" placeholder="Nama" required name="nama" value="<?= set_value('nama'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" required name="password" oninput="validasiPassword(this)" pattern="(?=.*d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> 
                                    <span class="text-danger" style="display:none;" id="panjang">Password harus 8 karakter</span>
                                    <span class="text-danger" style="display:none;" id="huruf">Password harus mengandung angka dan huruf</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Konfirmasi Password" required name="konfirmasiPassword">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-3 col-form-label"></label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio1" value="l">
                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio2" value="p">
                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="pekerjaan">
                                        <option selected>Pilih Pekerjaan</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                        <option value="kantoran">Kantoran</option>
                                        <option value="freelance">Freelance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="staticEmail" placeholder="Tanggal Lahir" required name="tanggalLahir" value="<?= set_value('tanggalLahir'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail" placeholder="Email" required name="emailUser" value="<?= set_value('email'); ?>">
                                </div>
                            </div>
                            <div class="container-login100-form-btn m-t-32">
                                <button class="login100-form-btn" type="submit" id="tombol" disabled>
                                    Daftar
                                </button>
                                <a class="login100-form-btn" type="submit" href="login">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <div id="dropDownSelect1"></div>
    <script>
        function validasiPassword(form) {
            password    = $(form).val();
            if (password.length < 8) {
                $('#panjang').css('display', 'block');
            } else {
                $('#panjang').css('display', 'none');
            }
            huruf  = /[A-Z]|[a-z]/g;
            angka  = /[0-9]/g;
            if (password.match(huruf) && password.match(angka)) {
                $('#huruf').css('display', 'none');
            } else {
                $('#huruf').css('display', 'block');
            }
            if (password.length < 8 && (password.match(huruf) && password.match(angka))) {
                $('#tombol').prop('disabled', false);
            }
        }
    </script>
</body>
</html>