<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!--<li class="header">MAIN NAVIGATION</li>-->
        <!-- <li class="treeview"> -->
         <li id="userdashboard">
        <a href="<?php echo url('/dashboard');?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        <span class="pull-right-container">
        </span>
        </a></li>
       <li id="author"><a href="<?php echo url('/booking');?>"><i class="fa fa-plus"></i>Booking</a></li>
        <li id="ltype"><a href="<?php echo url('/laundry-type');?>"><i class="fa fa-plus"></i>Laundry type</a></li>
        <li id="inventory"><a href="<?php echo url('/inventory');?>"><i class="fa fa-plus"></i>Inventory</a></li>
        <li id="stock"><a href="<?php echo url('/stock');?>"><i class="fa fa-plus"></i>Stock</a></li>
        <li id="employee"><a href="<?php echo url('/employee');?>"><i class="fa fa-plus"></i>Employee</a></li>
        <li id="tslot"><a href="<?php echo url('/time_slot');?>"><i class="fa fa-plus"></i>Time Slot</a></li>
        <li id="report"><a href="<?php echo url('/stock-report');?>"><i class="fa fa-plus"></i>Stock Report</a></li>
        <li id="breport"><a href="<?php echo url('/booking/report');?>"><i class="fa fa-plus"></i>Booking Report</a></li>
        
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- =============================================== -->
