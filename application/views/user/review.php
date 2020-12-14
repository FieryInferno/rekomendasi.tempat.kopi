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
                                <h2>Review</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>{nama}</h3>
                                <h5>{alamat}</h5>
                            </div>
                            <div class="card-body">
                                <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
                                <form action="<?= base_url('review') . '/' . $this->uri->segment(2); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Judul Review" type="text" name="judul" style="border:#e3d105 solid 2px;" required value="<?= set_value('judul'); ?>" >
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <textarea class="textarea" placeholder="Tulis Review Disini" type="text" name="review" style="border:#e3d105 solid 2px;" required value="<?= set_value('review'); ?>" ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="staticEmail" class="col-form-label">Tanggal Pergi</label>
                                                <input type="date" class="form-control" id="staticEmail" placeholder="Tanggal Pergi" required name="tanggalPergi" value="<?= set_value('tanggalPergi'); ?>" style="border:#e3d105 solid 2px;">
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-form-label">Harga per Orang</label>
                                                <select class="custom-select" name="harga" required>
                                                    <option value="" selected>Pilih Harga</option>
                                                    <option value="<50000">< Rp. 50.000</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="staticEmail" class="col-form-label">Fasilitas</label>
                                                <?php
                                                    foreach ($fasilitas as $key) { ?>
                                                        <div class="row">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fasilitas[]" id="inlineRadio1" value="<?= $key['idFasilitas']; ?>">
                                                                <label class="form-check-label" for="inlineRadio1"><?= $key['nama']; ?></label>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                ?>
                                            </div>
                                            <div class="form-group rating" id="rating">
                                                <input type="radio" class="rate" id="star5" name="rating" value="5"/>
                                                <label for="star5" title="Sempurna - 5 Bintang"></label>
                                                <input type="radio" class="rate" id="star4" name="rating" value="4"/>
                                                <label for="star4" title="Sangat Bagus - 4 Bintang"></label>
                                                <input type="radio" class="rate" id="star3" name="rating" value="3"/>
                                                <label for="star3" title="Bagus - 3 Bintang"></label>
                                                <input type="radio" class="rate" id="star2" name="rating" value="2"/>
                                                <label for="star2" title="Tidak Buruk - 2 Bintang"></label>
                                                <input type="radio" class="rate" id="star1" name="rating" value="1"/>
                                                <label for="star1" title="Buruk - 1 Bintang"></label>
                                            </div>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Upload Foto</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="">
                        <div class="card">
                            <div class="card-header">
                                <h3>Review dari Pengunjung</h3>
                            </div>
                            <div class="card-body" style="height:500px;overflow:auto;">
                                <?php
                                    foreach ($review as $key) { ?>
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="<?= base_url(); ?>assets/images/<?= $key['foto']; ?>" alt="img" width="75px" height="75px"/>
                                            </div>
                                            <div class="col-10">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <?= $key['judul']; ?>
                                                        <div class="pull-right">
                                                            <span>
                                                                <?php
                                                                    for ($k=0; $k < 5; $k++) {
                                                                        if ($key['rating'] > $k) { ?>
                                                                            <i class="fa fa-star checked"></i>
                                                                        <?php } else { ?>
                                                                            <i class="fa fa-star"></i>
                                                                        <?php }
                                                                    }
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <?= $key['review_pengguna']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>