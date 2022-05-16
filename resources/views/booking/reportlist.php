
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
  <h2>Booking Report</h2>    
  <h4 style="text-align:right"> Receipt Created on 20<?php echo date('y-m-d');  ?> </h4>              
  <table class="table table-striped" style="margin-top:30px">
    <thead>
      <tr>
        <th>Pick Up Date</th><th>Time Slot</th><th>Customer Name</th><th>Address</th><th>Phone</th><th>Tracking ID</th><th>Email</th><th>Unit in Kg</th><th>Price</th><th>Total</th>
        <!-- <th>Price</th> -->
      </tr>
    </thead>
    <tbody>
    	<?php foreach($item as $a){ ?>
      <tr>
        <td><?php echo $a->pickupdate;?></td>
        <td><?php echo $a->slot;?></td>
       
        <td><?php echo $a->fullname;?></td>
        <td><?php echo $a->address;?></td>
         <td><?php echo $a->phone;?></td> 
         <td><?php echo $a->trackingcode;?></td>
         <td><?php echo $a->email;?></td> 
         <td><?php echo $a->unit;?></td>
         <td><?php echo $a->price;?></td>
         <td><?php echo $a->total;?></td>
      </tr>
  <?php } ?>
     
    </tbody>
  </table>
</div>

</body>
</html>
