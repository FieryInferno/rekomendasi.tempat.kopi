<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('template/head'); ?>
<!-- body -->

<body class="main-layout">
    <?php $this->load->view('template/header'); ?>
        <div class="yellow_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Halaman Admin</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section -->
        <section>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Tambah Tempat Ngopi</h3>
                    </div>
                    <div class="card-body">
                    <form class="login100-form validate-form" method="post" action="daftar">
                            <?php if ($this->session->pesan) echo $this->session->pesan; ?>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Tempat Kopi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail" placeholder="Nama Tempat Ngopi" required name="nama" value="{nama}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat Tempat Kopi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail" placeholder="Alamat" required name="alamat" value="{alamat}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Harga per orang</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="harga" required>
                                        <option value="" selected>Pilih Harga</option>
                                        <option value="<50000">< Rp. 50.000</option>
                                        <option value=">50000">> Rp. 50.000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <?php
                                        foreach ($fasilitas as $key) { ?>
                                            <div class="row">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="fasilitas[]" id="inlineRadio1" value="<?= $key['idFasilitas']; ?>" <?= in_array($key['idFasilitas'], array_column($fasilitas, 'idFasilitas')) ? 'checked' : '' ; ?>>
                                                    <label class="form-check-label" for="inlineRadio1"><?= $key['nama']; ?></label>
                                                </div>
                                            </div>
                                        <?php }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="oldFoto" value="{foto}">
                                    <input class="form-control" placeholder="Foto Profile" type="file" name="foto">
                                </div>
                            </div>
                            <div class="container-login100-form-btn m-t-32">
                                <button class="btn btn-success" type="submit">
                                    Edit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('template/footer'); ?>
</body>

</html>