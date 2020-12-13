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
                                <h2>Detail Tempat Ngopi</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <section>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        {nama}
                        <span>
                            <?php
                                for ($k=0; $k < 5; $k++) {
                                    if ($rating > $k) { ?>
                                        <i class="fa fa-star checked"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-star"></i>
                                    <?php }
                                }
                            ?>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <img src="<?= base_url(); ?>assets/images/{foto}" alt="#"/>
                            </div>
                            <div class="col-6">
                                <h3>Fasilitas</h3>
                                <div class="list-group">
                                    <?php
                                        foreach ($fasilitas as $key) { ?>
                                            <a href="#" class="list-group-item list-group-item-action"><?= $key['namaFasilitas']; ?></a>
                                        <?php }
                                    ?>
                                </div>
                                <br>
                                <a href="review" class="btn btn-success">Tulis Review</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>