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
</head>