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
                                <h2>Rekomendasi Tempat Ngopi</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <section>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <?php
                            if ($mae !== null) {$no = 1;
                                foreach ($rekomendasi as $key => $value) { 
                                    if ($no <= 5) { ?>
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="<?= base_url(); ?>assets/images/<?= $tempat[$key]['foto']; ?>" alt="#"/>
                                            </div>
                                            <div class="col-8">
                                                <h3><a href="<?= base_url('detail/' . $key); ?>"><?= $tempat[$key]['nama']; ?></a></h3>
                                                <h6><?= $tempat[$key]['alamat']; ?></h6> 
                                                <?php
                                                    for ($k=0; $k < 5; $k++) {
                                                        if ($tempat[$key]['rating'] > $k) { ?>
                                                            <i class="fa fa-star checked"></i>
                                                        <?php } else { ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    <?php } 
                                    $no++;    
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php $this->load->view('template/footer'); ?>
</body>

</html>