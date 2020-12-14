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
                                <h2>Tempat Ngopi Populer</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section -->
            <section class="resip_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme">
                                <?php
                                    foreach ($tempatNgopi as $key) { ?>
                                        <div class="item">
                                            <div class="product_blog_img">
                                                <img src="<?= base_url('assets/images/' . $key['foto']); ?>" alt="#" />
                                            </div>
                                            <div class="product_blog_cont">
                                                <h3><?= $key['nama']; ?></h3>
                                            </div>
                                        </div>
                                    <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php $this->load->view('template/footer'); ?>
</body>

</html>