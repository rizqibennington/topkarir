<?php if($this->session->userdata['id'] == '') {redirect('login_student/logout');} ?>
<!-- header -->
<?php $this->load->view('includes/header_student') ?>
<!-- end header -->

        <!-- menu -->
        <?php $this->load->view('includes/menu_student') ?>
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
