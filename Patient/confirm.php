<!DOCTYPE html>
<html>
<head>
	<title></title>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">
</head>
<body>
<?php   
         
          
          $var = $_GET['var'];
          $sql = "SELECT DID , doctor , DEPT , days  from doctor_time WHERE DID = '$var'";
          $result = $conn->query($sql);
          if($conn->affected_rows > 0)
           {
                 $show = $result->fetch_assoc();
?>


<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="disabledTextInput" >Name</label>
      <input type="text" class="form-control" id="disabledTextInput" disabled placeholder="<?php echo $show['doctor'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="disabledTextInput" >Department</label>
      <input type="text" class="form-control" id="disabledTextInput" disabled placeholder="<?php echo $show['DEPT'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInout">Time</label>
    <input type="text" class="form-control" id="disabledTextInput" disabled placeholder="<?php echo $show['days'] ?>">
  </div>
  <div class="form-group">
    <label for="">Your timing</label>
    <input type="text" name="time" class="form-control" placeholder="enter your preffered time">
  </div>
<div>
  <input name="date" id="datepicker" width="200" placeholder="Date">
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap3'
        });
    </script>
</div>
<br>
  <input type="submit" name="submit" class="btn btn-primary" value="OK proceed">
  <!-- <a href="" data-toggle="modal" data-target="#Modal_pay" class="btn btn-success p-2">Payment</a>  -->
      <?php } ?>
      <!--  -->
</body>
</html>












