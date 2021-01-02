<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>{title}</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <style>
        .checked {
        color: orange;
        }
        .rating {
            border: none;
            float: left;
        }
        .rating > input { display: none; }
        .rating > label::before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }
        .rating > label {
            color: #ddd;
            /* float: right; */
        }
        .rating > input:checked ~ label,
        .rating:not(:checked) > label:hover,
        .rating:not(:checked) > label:hover ~ label {
            color: #f7d106;
        }
        .rating > input:checked + label:hover,
        .rating > input:checked ~ label:hover,
        .rating > label:hover ~ input:checked ~ label,
        .rating > input:checked ~ label:hover ~ label {
            color: #fce873;
        }
        h4 {
            font-weight: normal;
            margin-top: 40px;
            margin-bottom: 0px;
        }
        #star {
            float: left;
            padding-right: 20px;
        }
        #star span{
            padding: 3px;
            font-size: 20px;
        }
    </style>


<!-- Javascript files-->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery-3.0.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
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

        $('#table').DataTable();
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
<?php
    if ($this->uri->segment(2) == 'user') { ?>
        <script>
            $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                <?= count($tempatNgopi) > 5 ? 'loop: true,' : '' ; ?>
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
    <?php }
?>
</head>