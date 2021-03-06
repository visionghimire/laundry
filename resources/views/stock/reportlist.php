
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LMS Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div style="text-align:center;">
  <img src="<?php echo url("/");?>/images/mrspin.png" height="150" width="250" alt="Company Name">
  </div>
  <h2> Stock Report</h2>  
  <h4 style="text-align:right"> Report Created on 20<?php echo date('y-m-d');  ?> </h4>
         
  <table class="table table-striped" style="margin-top:50px">
    <thead>
      <tr>
        <th>Inventory Name</th>
        <th>In Quantity</th>
        <th>Used Quantity</th>
        <th>Remaining Quantity</th>
        <!-- <th>Price</th> -->
      </tr>
    </thead>
    <tbody>
    	<?php foreach($item as $a){ ?>
      <tr>
        <td><?php echo $a->name;?></td>
        <td><?php echo $a->in_qty;?></td>
        <?php if($a->used_qty==null){
        	$uq=0;
        }else{$uq=$a->used_qty;}?>
        <td><?php echo $uq;?></td>
        <td><?php echo $a->remaining_qty;?></td>
        <!-- <td><?php echo $a->price;?></td> -->
      </tr>
  <?php } ?>
     
    </tbody>
  </table>
</div>

</body>
</html>
