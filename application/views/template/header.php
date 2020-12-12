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
                <a href="editProfile">Edit Profile</a>
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
                                <li class="dinone"><a href="<?= base_url(); ?>">Beranda</a></li>
                                <li class="dinone"><a href="pencarian">Pencarian</a></li>
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