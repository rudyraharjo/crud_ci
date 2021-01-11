<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
            <a href="<?php echo base_url('Dashboard') ?>"?>
                <h2>Test Tangkot<h2>
            </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="<?php echo base_url('Pasien'); ?>">
                        <i class="zmdi zmdi-male-female"></i>Data Pasien</a>
                </li>

            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<aside class="menu-sidebar2">
    <div class="logo">
        <a href="<?php echo base_url('Dashboard') ?>"?>
            <h2>Test Tangkot<h2>
        </a>

    </div>
    <div class="menu-sidebar2__content">
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="<?=($this->uri->segment(1)==='Pasien')?'active':''?>">
                    <a href="<?php echo base_url('Pasien'); ?>">
                        <i class="zmdi zmdi-male-female"></i>Data Pasien</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>