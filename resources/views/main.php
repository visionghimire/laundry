<?php include(resource_path().'/views/sections/header.php');?>
<?php include(resource_path().'/views/sections/leftmenu.php');?>
<div  id="body" class="content-wrapper">
<?php

$cd=date("Y-m-d");
$mnth=substr($cd,5,2);
$yr=substr($cd,0,4);
$ym=$yr."-".$mnth;

$stock=DB::table('inventory')->where("date_created",'LIKE',"$ym%")->get();
$ex=0;
foreach($stock as $st){
 $unit=$st->price/$st->in_qty;
 $exp=$unit*$st->used_qty;
 $ex=$ex+$exp;
}
$m=(int)($mnth-1);
// dd($m);
$expmnth=[];
$ordermnth=[];
for($i=$m;$i>=1;$i--){
  $yms=$yr."-0".$i;
 // dd($yms);
  $expmnth[$i]=DB::table("expenses")->where("months","=",$i)->where("years","=",$yr)->sum("price");
  $ordermnth[$i]=DB::table("booking")->where("pickupdate",'LIKE',"$yms%")->count();
  $sentmnth[$i]=DB::table("booking")->where("pickupdate",'LIKE',"$yms%")->where("status","=",6)->count();
  $incomemnth[$i]=DB::table("booking")->where("pickupdate",'LIKE',"$yms%")->where("status","=",6)->sum("total");
  $mnthsarr[$i]=DB::table("months")->where("id","=",$i)->first();
}
// dd($incomemnth);
// dd($ex);
$exp=DB::table("expenses")->where("months","=",$mnth)->where("years","=",$yr)->sum("price");
$mnths=DB::table("months")->where("id","=",$mnth)->first();
$order=DB::table("booking")->where("pickupdate",'LIKE',"$ym%")->count();
$sent=DB::table("booking")->where("pickupdate",'LIKE',"$ym%")->where("status","=",6)->count();
$income=DB::table("booking")->where("pickupdate",'LIKE',"$ym%")->where("status","=",6)->sum("total");
//dd($income);
$profit=$income-$exp-$ex;
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
            <span class="info-box-icon bg-red"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content" id="survey">
              <span class="info-box-text">Total Stock Expenses</span>
              <span class="info-box-number" > <?php echo $ex;?></span>
              

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content" id="survey">
              <span class="info-box-text">Total Income</span>
              
              <span class="info-box-number" > <?php echo $income;?></span>
              

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>




        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content" id="survey">
              <span class="info-box-text">Total Profit/Loss</span>
              <span class="info-box-text"><?php echo $income."-".$exp."-".$ex;?>=</span>
              <span class="info-box-number" > <?php echo $income-$exp-$ex;?></span>
              

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

        <div class="col-md-6">
          <div class="info-box">
           <h1> Record of year <?php echo $yr;?></h1>
          <table id="vision"  class="table table-striped table-bordered">
            <tr>
              <th>Month</th>
              <th>Total orders</th>
              <th>Total Income</th>
              <th>Total Expenses</th>
              <th>Total Profit/Loss</th>
            </tr>
            <tr>
              <td><?php echo $mnths->month;?></td>
              <td><?php echo $order;?></td>
              <td><?php echo $income;?></td>
              <td><?php echo ($exp+$ex);?></td>
              <td><?php echo ($income-$exp-$ex);?></td>
            </tr>
            <?php foreach($mnthsarr as $k=>$v){ ?>
              <tr>
                <td><?php echo $mnthsarr[$k]->month;?></td>
                <td><?php echo $ordermnth[$k] ;?></td>
                <td><?php echo $incomemnth[$k] ;?></td>
                <td><?php echo $expmnth[$k] ;?></td>
                <td><?php echo $incomemnth[$k]-$expmnth[$k] ;?></td>
              </tr>
            <?php } ?>
            </tr>
          </table>
        </div>
        <button type="button"class="btn btn-success" onclick="fnExcelReport()">Export</button>
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


 function fnExcelReport() {

         tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
   
    tab = document.getElementById('vision'); // id of table

   for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"participant.xls");
    }  
    else                 
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
  }

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

