
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
  <h2>Employee Clock In / Clock Out Report</h2>           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th><th>Address</th><th>Type</th><th>Time</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach($item as $a){ ?>
      <tr>
        <td><?php echo $a->name;?></td>
         <td><?php echo $a->address;?></td>
        <td><?php echo $a->type;?></td>
        <td><?php echo $a->timestmp;?></td>
       
      </tr>
  <?php } ?>
     
    </tbody>
  </table>
</div>

</body>
</html>
