        <!-- footer -->
        <fooetr>
            <div class="footer">
                <?php
                    if ($this->uri->segment(1) == 'editProfile') { ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class=" col-md-12">
                                    <h2>Edit Profile</h2>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <form class="main_form" action="editProfile" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Username" type="text" name="username" value="{username}" required>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Nama" type="text" name="nama" value="{nama}" required>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Password Baru" type="password" name="password" required>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Konfirmasi Password Baru" type="password" name="konfirmasiPassword" required>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio1" value="l" required>
                                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio2" value="p" required>
                                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <select class="custom-select" name="pekerjaan" required>
                                                    <option selected>Pilih Pekerjaan</option>
                                                    <option value="mahasiswa">Mahasiswa</option>
                                                    <option value="kantoran">Kantoran</option>
                                                    <option value="freelance">Freelance</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Tanggal Lahir" type="date" name="tanggalLahir" value="{tanggalLahir}" required>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Tanggal Lahir" type="email" name="email" value="{email}" required>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <button class="send">Simpan</button>
                                                <button class="send">Kembali</button>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="img-box text-center">
                                        <?php
                                            if ($foto) { ?>
                                                <img src="<?= base_url(); ?>assets/images/{foto}" alt="img" width="500px" height="500px"/>
                                            <?php } else { ?>
                                                <img src="<?= base_url(); ?>assets/images/user.png" alt="img" width="500px" height="500px"/>
                                            <?php }
                                        ?>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <input class="form-control" placeholder="Foto Profile" type="file" name="foto" required>
                                        </div>
                                    </div>
                                </div>
                                    </form>
                            </div>
                        </div>
                    <?php }
                ?>
                <div class="copyright">
                    <div class="container">
                        <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
                    </div>
                </div>
            </div>
        </fooetr>
        <!-- end footer -->
    </div>
</div>
<div class="overlay"></div>
<!-- Javascript files-->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

<script src="<?= base_url(); ?>assets/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function() {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

<style>
#owl-demo .item{
    margin: 3px;
}
#owl-demo .item img{
    display: block;
    width: 100%;
    height: auto;
}
</style>
<script>
    $(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        margin: 10,
        nav: true,
        loop: true,
        responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 5
        }
        }
    })
    })
</script>