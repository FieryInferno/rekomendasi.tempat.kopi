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
                                <h2>Pencarian Tempat Ngopi</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <section>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url(); ?>pencarian" method="get">
                            <div class="row">
                                <div class="col-6">
                                    <input class="tetter" placeholder="Tempat Ngopi" type="text" name="nama">
                                    <button class="submit">Cari</button>
                                </div>
                                <div class="col-6">
                                    <select class="custom-select" name="fasilitas">
                                        <option value="" selected>Pilih Fasilitas</option>
                                        <?php
                                            foreach ($fasilitas as $key) { ?>
                                                <option value="<?= $key['idFasilitas']; ?>"><?= $key['nama']; ?></option>
                                            <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <?php
                            if ($this->session->pesan) echo $this->session->pesan;
                            if ($pencarian) { ?>
                                <h3>Hasil Pencarian</h3>
                                <?php 
                                    for ($i=0; $i < count($pencarian);) { ?>
                                        <!-- blog -->
                                        <div class="blog">
                                            <div class="container">
                                                <div class="row">
                                                    <?php
                                                        for ($j=0; $j < 3; $j++) {  
                                                            if (isset($pencarian[$i])) { 
                                                                $key    = $pencarian[$i]; ?>
                                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom">
                                                                    <div class="blog_box">
                                                                        <div class="blog_img_box">
                                                                            <figure>
                                                                                <img src="<?= base_url(); ?>assets/images/<?= $key['foto']; ?>" alt="#"/>
                                                                                <span style="width:auto;">
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
                                                                            </figure>
                                                                        </div>
                                                                    <h3><a href="detail/<?= $key['id_tempat_ngopi']; ?>"><?= $key['nama']; ?></a></h3>
                                                                    <p><?= $key['alamat']; ?></p>
                                                                    </div>
                                                                </div>
                                                            <?php }
                                                            $i++;
                                                        }
                                                        
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end blog -->
                                <?php }
                            }
                        ?>
                        <div class="row d-flex justify-content-center">
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php $this->load->view('template/footer'); ?>
</body>

</html>