<?php include(resource_path().'/views/sections/header.php');?>
<?php include(resource_path().'/views/sections/leftmenu.php');?>
<div  id="body" class="content-wrapper">
<?php

$cd=date("Y-m-d");
$mnth=substr($cd,5,2);
$yr=substr($cd,0,4);
$ym=$yr."-".$mnth;
// dd($ym);
$exp=DB::table("expenses")->where("months","=",$mnth)->where("years","=",$yr)->sum("price");
$mnths=DB::table("months")->where("id","=",$mnth)->first();
$order=DB::table("booking")->where("pickupdate",'LIKE',"$ym%")->count();
$sent=DB::table("booking")->where("pickupdate",'LIKE',"$ym%")->where("status","=",4)->count();
$income=DB::table("booking")->where("pickupdate",'LIKE',"$ym%")->where("status","=",4)->sum("total");
//dd($income);
$profit=$income-$exp;
$mnt=$mnths->month;

?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard For the year <?php echo $yr;?> and month of <?php echo $mnths->month;?>
        <!-- <small>it all starts here</small> -->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

          <div class="row" id="dashboards">


             <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content" id="survey">
              <span class="info-box-text">Total Expenses</span>
              <span class="info-box-number" > <?php echo $exp;?></span>
              

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>



        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content" id="survey">
              <span class="info-box-text">Total Profit</span>
              <span class="info-box-text"><?php echo $income."-".$exp;?>=</span>
              <span class="info-box-number" > <?php echo $income-$exp;?></span>
              

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
              <span class="info-box-number"> <?php echo $order;?></span>
              
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
              <span class="info-box-number"><?php echo $sent;?></span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
       
        <!-- /.col -->
      

      <div class="row col-md-12">
        <div class="col-md-6">
          <figure class="highcharts-figure">
  <div id="container"></div>
  
</figure>

        </div>

        
      </div>

    </div>

    
    </section>
   
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
var baseurl="<?php echo url('/');?>";
var income="<?php echo $income;?>";
var exp="<?php echo $exp;?>";
var profit="<?php echo $profit;?>";
var yr="<?php echo $yr;?>";
var mnt="<?php echo $mnt;?>";



Highcharts.chart('container', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {
    text: 'Income and Expenditure'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      depth: 35,
      dataLabels: {
        enabled: true,
        format: '{point.name}'
      }
    }
  },
  series: [{
    type: 'pie',
    name: mnt,
    data: [
      ['Income', parseInt(income)],
      ['Expenditure',parseInt(exp)],
      ['Profit', parseInt(profit)]
    ]
  }]
});
  
</script>
<?php include(resource_path().'/views/sections/footer.php');

