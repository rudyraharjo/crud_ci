<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('template/head') ?>

<body class="animsition">
    <div class="page-wrapper">
        <?php $this->load->view('template/sidebar') ?>

        <div class="page-container">
        	<?php $this->load->view('template/header_desktop') ?>

            <div class="main-content">
                <?php $this->load->view($content); ?>
            </div>
            
        </div>
        
    </div>

    <?php $this->load->view('template/footer') ?>

</body>
</html>
