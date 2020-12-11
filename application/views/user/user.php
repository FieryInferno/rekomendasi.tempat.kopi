<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title><?= $title; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <!-- owl css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <!-- responsive-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="<?= base_url(); ?>assets/images/loading.gif" alt="" /></div>
    </div>
    <div class="wrapper">
    <!-- end loader -->
        <div class="sidebar">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="index.html">Edit Profile</a>
                    </li>
                    <li>
                        <a href="logout">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="content">
        <!-- header -->
            <header>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <div class="full">
                                <div class="right_header_info">
                                    <ul>
                                        <li class="dinone"><a href="">Beranda</a></li>
                                        <li class="dinone"><a href="">Pencarian</a></li>
                                        <li class="dinone"><a href="">Rekomendasi</a></li>
                                        <li class="dinone">Hi, <?= $this->session->username; ?></li>
                                        <li>
                                            <button type="button" id="sidebarCollapse">
                                                <img src="<?= base_url(); ?>assets/images/menu_icon.png" alt="#">
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- end header -->
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
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs1.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Amor Kopi</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs2.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Sejiwo Coffee</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs3.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Kopi Anjis</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs4.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Marka Coffee & Kitchen</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs5.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Kopi Toko Djawa</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs1.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Two Cents</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs2.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Lalune Coffee & Luncheonette</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs3.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Lo.Ka.Si Coffee & Space</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs4.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Warung Kopi</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/rs5.png" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>The Coffee Break</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- footer -->
            <fooetr>
                <div class="footer">
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

</body>

</html>