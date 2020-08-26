<!DOCTYPE html>
<html>
<head>
	<title></title>


 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />







</head>
<body>

<?php

   if (isset($_GET['var'])) {
        $var = $_GET['var'];# code...
     
       $conn = mysqli_connect("localhost", "root", "", "uni");
  
  $sql = "SELECT D_id,Name,Dept,Time from doctor where D_id= '$var' ";

      $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));      
      while( $record = mysqli_fetch_assoc($resultset) ) {
      ?>

<form onsubmit="return false" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="disabledTextInput" >Name</label>
      <input type="text" class="form-control" id="disabledTextInput" disabled placeholder="<?php echo $record['Name']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="disabledTextInput" >Department</label>
      <input type="text" class="form-control" id="disabledTextInput" disabled placeholder="<?php echo $record['Dept']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInout">Time</label>
    <input type="text" class="form-control" id="disabledTextInput" disabled placeholder="<?php echo $record['Time']; ?>">
  </div>
<div>
  <input name="date" id="datepicker" width="276" placeholder="Date">
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</div>
<br>
  <input type="submit" name="submit" class="btn btn-primary" value="OK proceed">
</form>
<?php
  
}
} ?>
<?php                      
                      
               $sql1 = "INSERT INTO user(D_id,Name) VALUES ('$record['D_id']','$record['Name']')";
                              $result = $conn->query($sql1);
                              if($conn -> affected_rows > 0)
                              	   echo "YES";
                              else{
                              	echo "Somethiong Wnrg";
                              }   
                  ?>
 
</body>
</html>












