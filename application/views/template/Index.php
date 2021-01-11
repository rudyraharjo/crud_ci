<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('template/head') ?>

<body class="animsition" base_url="<?php echo base_url(); ?>">
    <div class="page-wrapper">
        <?php $this->load->view('template/sidebar') ?>

    </div>

    <div class="page-container">
        <?php $this->load->view('template/header_desktop') ?>

        <div class="main-content" style="padding-bottom: 15px;">
            <?php $this->load->view($content); ?>

            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Cepat Pintar. Powered by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div> -->
        </div>

    </div>

    <?php $this->load->view('template/footer') ?>

</body>

</html>