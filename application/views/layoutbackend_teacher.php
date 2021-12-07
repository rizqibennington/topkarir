<?php if($this->session->userdata['nama'] == '') {redirect('login_teacher/logout');} ?>
<!-- header -->
<?php $this->load->view('includes/header_teacher') ?>
<!-- end header -->

        <!-- menu -->
        <?php $this->load->view('includes/menu_teacher') ?>
        <!-- end menu -->

        <!-- page-wrapper -->
        <div id="page-wrapper">       
            <?php echo $contents; ?>
        </div>
        <!-- /# end page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

</body>

</html>
