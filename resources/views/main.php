<?php include(resource_path().'/views/sections/header.php');?>
<?php include(resource_path().'/views/sections/leftmenu.php');?>
<div  id="body" class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>it all starts here</small> -->
      </h1>
    </section>
<?php


?>
    <!-- Main content -->
    <section class="content">

          <div class="row" id="dashboards">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content" id="survey">
              <span class="info-box-text">Total Profit</span>
              <span class="info-box-number" > 11</span>
              

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>

            <div class="info-box-content" id="vaform">
              <span class="info-box-text">Total Order</span>
              <span class="info-box-number"> 12</span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-reply"></i></span>

            <div class="info-box-content" id="matform">
              <span class="info-box-text">Total Delivery</span>
              <span class="info-box-number">111</span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
       
        <!-- /.col -->
      </div><br>

    
    </section>
   
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
var baseurl="<?php echo url('/');?>";
  
</script>
<?php include(resource_path().'/views/sections/footer.php');

