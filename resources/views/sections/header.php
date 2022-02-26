<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>" />
        <title><?php echo empty($title) ? "LMS" : $title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo asset('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo asset('css/AdminLTE.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('css/tree.css'); ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo asset('css/nepdate.css'); ?>">
        <script src="<?php echo asset('js/scripts.js'); ?>" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo asset('css/skins/_all-skins.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('css/jquery.dataTables.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('css/jquery.toast.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('css/card.css'); ?>">
         <link rel="stylesheet" href="<?php echo asset('css/select2.min.css');?>">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
     
        <style>
            .skin-black-light .treeview-menu>li>a {
                color: #000;
            }
            .sidebar-menu .treeview-menu>li>a {
                font-size: 15px;
            }
            .sidebar-menu>li>a {
                font-size: 16px;
            }
            .user-footer div, .user-footer div a{
                width: 100%;
            }
            .skin-purple-light .wrapper, .skin-purple-light .main-header .navbar, .skin-purple-light .main-sidebar {

                    background: url(<?php echo url('/'); ?>/images/sky-bg.jpg);
                    
                    background-size: cover;
            }
            .skin-purple-light .main-header .logo{
                    background-color: #416aaa;
            }
            .skin-purple-light .sidebar a {
    color: #fff;
}
.skin-purple-light .treeview-menu>li>a {
    color: #fff;
}
.skin-purple-light .sidebar-menu>li>.treeview-menu {
    background: #f4f4f500;
}
.org-name span{
        font-size: 24px;
    line-height: 2;
    color: #fff;
    /* padding: 11px; */
    font-weight: 600;
}
        </style>


        <script type="text/javascript">
            var baseUrl = "<?php echo url('/'); ?>";
            var notification;
<?php
//echo $msg;
if (Session::has('msg')):
    ?>
 notification = JSON.parse('<?php echo Session::get('msg'); ?>');
<?php endif; ?>
        </script>
        
    </head>
    <body class="hold-transition skin-purple-light sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo url('/'); ?>" class="logo">
                    
                   
                    <span class="logo-mini"><b>LMS</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b> LMS</b></span>
                    

                </a>
               
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                     <div class="col-md-10 org-name text-center">
                        <span>Laundry Management System</span>
                    </div> 
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Notifications: style can be found in dropdown.less -->
                            <!-- Tasks: style can be found in dropdown.less -->
                            <!-- User Account: style can be found in dropdown.less -->
                           
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 
                                    <span class="hidden-xs fa fa-user fa-lg">  <?php echo Session::get('username'); ?></span>
                                </a>
                                <ul class="dropdown-menu" style="min-width:100px; width: 100px;">
                                    <!-- User image -->
                                    <li class="user-header hide" >
                                        <p id="user-fullname">

                                            <small id="user-email"></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body hide">

                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="" >
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="" style="margin-top:5px;">
                                            <a href="<?php echo url('/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
