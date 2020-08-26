<?php
 
 include 'action_admin.php';

?>


<!-- <!DOCTYPE html>
<![if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="admin.css">
   <style>
       section {
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(bg.jpg);
    background-size:cover;
    height:100%;
    display: flex;
    flex-direction: column;
       }
   </style>
    <?php  include 'header.php' ?>
    </head>
   <body>
   <section>
<div class="main-body">
   <div class="container-fluid">
                        <div class="row justify-content-center">
                            <?php if(isset($_SESSION['response'])){?>

                            <div class="alert alert-<?= $_SESSION['res_type'] ; ?> alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $_SESSION['response'] ;?> 
                    </div>

                    <?php      }  unset($_SESSION['response']) ?>
                            </div>
        <div class="row" style="margin-left:10px;">
            <div calss="col-md-4" >
                    <h3 class="text-center text-info p-2" style="width:300px; font-size:30px ; font-weight:700; height:auto">Add Staff</h3>
                    <form method="POST" action="action_admin.php" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <input name="sid" class="form-control" type="text" placeholder="Enter the Staff Id"  value="<?= $sid;?>" required>
                            
                </div>
                <div class="form-group">
                    <input name="name" class="form-control" type="text" placeholder="Enter the Name" value="<?= $name;?>" required>
                    
                </div>
                <div class="form-group">
                    <input name="address" class="form-control" type="text" placeholder="Enter the Address" value="<?= $add;?>" required>
                    
                </div>
                <div class="form-group">
                    <input name="email" class="form-control" type="text" placeholder="Enter the email" value="<?= $email;?>" required>
                    
                </div>
                <div class="form-group">
                    <input name="phone" class="form-control" type="text" placeholder="Enter the phone" value="<?= $ph;?>" required>
                    
                </div>
                <div class="form-group">
                    <input name="dept" class="form-control" type="text" placeholder="Enter the Department" value="<?= $dept;?>" required>
                    
                </div>
                <div class="form-group">
                    <input name="desig" class="form-control" type="text" placeholder="Enter the phone" value="<?= $desig;?>" required>
                    
                </div>
                <div class="form-group">
                    <input name="salary" class="form-control" type="text" placeholder="Enter the phone" value="<?= $salary;?>" required>
                    
                </div>
                <div class="form-group">
                    <?php

                    if($update == true){
                        ?>
                    <input type="submit" name="update-staff" class="btn btn-success btn-block"   value="update" required>
                    <?php }
                    else{
                        ?>
                    <input type="submit" name="add-staff" class="btn btn-primary"   value="submit" required>
                    <?php } ?>
                </div>                    
               </form>
    </div>
                    <div class="col-md-8" style="margin-right:20px;left:5px; bottom:20px;top:40px;left:20px;">


                     <?php 
                         $show = "SELECT SID,NAME,ADDRESS,PHONE,DEPT,DESIGNATION,SALARY FROM STAFF";
                         $result = $conn->query($show);

                    ?>
                    <div class="table-wrapper p-4" style="width:900px">
                              <table class="table hover-table text-center">
                                                <thead>
                                                <tr>
                                                    <th>Sid</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Dept</th>
                                                    <th>Designation</th>
                                                    <th>salary</th>
                                                    
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                    
                                                     while($row = $result->fetch_assoc()){
                                                    
                                                    ?>
                                                    <tr>
                                                    <td><?=$row['SID']?></td>
                                                    <td><?=$row['NAME']?></td>
                                                    <td><?=$row['ADDRESS']?></td>
                                                    <td><?=$row['PHONE']?></td>
                                                    <td><?=$row['DEPT']?></td>
                                                    <td><?=$row['DESIGNATION']?></td>
                                                    <td><?=$row['SALARY']?></td>

                                                    
                                                    <td>
                                                    <a href="add_staff.php?edit-staff=<?=$row['SID'];?>" class="badge badge-success p-2" name="approve">Edit</a> |
                                                    <a href="action_admin.php?delete-staff=<?=$row['SID'];?>" onclick="return confirm('Do You want to delete this record?');" class="badge badge-danger p-2">Delete</a></td>
                                                    </tr>  
                                                    <?php } ?>
                                                </tbody>
                                                    
                                                
                        </table>
                    </div>
                    
                        <div class="row justify-content-center">
                               <a href="output.php" class="btn btn-warning p-2">Download Pdf</a>
                        </div>
                </div>
         </div>
  </div>
                        <?php
       ?>

        </section>
    </body>
    <?php include 'footer.php'?>
</html>