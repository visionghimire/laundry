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
       <li id="booking"><a href="<?php echo url('/booking');?>"><i class="fa fa-plus"></i>Booking</a></li>
        <li id="ltypes"><a href="<?php echo url('/laundry-type');?>"><i class="fa fa-plus"></i>Laundry type</a></li>
        <li id="inventory"><a href="<?php echo url('/inventory');?>"><i class="fa fa-plus"></i>Stock Item</a></li>
        <li id="stock"><a href="<?php echo url('/stock');?>"><i class="fa fa-plus"></i>Inventory</a></li>
        <li id="employee"><a href="<?php echo url('/employee');?>"><i class="fa fa-plus"></i>Employee Records</a></li>
        <li id="clock"><a href="<?php echo url('/clock');?>"><i class="fa fa-plus"></i>Employee Time In/Out </a></li>
        <li id="exp"><a href="<?php echo url('/expenses');?>"><i class="fa fa-plus"></i>Expenses</a></li>
        <li id="tslot"><a href="<?php echo url('/time_slot');?>"><i class="fa fa-plus"></i>Time Slot</a></li>
        <li id="report"><a href="<?php echo url('/stock-report');?>"><i class="fa fa-plus"></i>Inventory Report</a></li>
        <li id="breport"><a href="<?php echo url('/booking/report');?>"><i class="fa fa-plus"></i>Booking Report</a></li>
        <li id="empreport"><a href="<?php echo url('/employee/report');?>"><i class="fa fa-plus"></i>Employee Time In/Out Report</a></li>
        
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- =============================================== -->
