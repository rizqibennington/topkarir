<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class ="navbar-brand" href="<?php echo base_url('dashboard_teacher'); ?>"><strong>TOP KARIR INDONESIA!</strong></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        <?php echo  $this->session->userdata['nama']; ?>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url('teacher/edit/'.$this->session->userdata['id']) ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="<?php echo base_url('login_teacher/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse navbar-default">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="#"><i class="fa fa-desktop fa-fw"></i> Admin Master<span class="fa arrow"></span></a>
                            <ul class="nav  navbar-default nav-second-level">
                                <li> 
                                    <a href="<?php echo base_url('dashboard_teacher'); ?>"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                                </li>
                                <li> 
                                    <a href="<?php echo base_url('student'); ?>"><i class="fa fa-users fa-fw"></i> Student</a>
                                </li>
                                <li> 
                                    <a href="<?php echo base_url('teacher'); ?>"><i class="fa fa-users fa-fw"></i> Teacher</a>
                                </li>
                                <li>
                            </ul>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url('login_teacher/logout') ?>"><i class="fa fa-power-off fa-fw"></i> Logout</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>