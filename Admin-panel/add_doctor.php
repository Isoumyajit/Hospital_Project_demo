<?php
 include 'action_admin.php';
if(!isset($_SESSION['uname']))
{
    header('location:admin_login.php');
}
?>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
 <link rel="stylesheet"  href="admin.css">
<!-- <!DOCTYPE html>
<![if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
   <style>
      section {
           padding: 11rem 10;
           background: wheat;
           background-size:cover;
           height:100%;
       }
       
       .table-wrapper {
           height: 350px;
           bottom:30px;
           /* background-color: orange; */
           overflow: auto;
           margin: 10px;
           width:  850px;
           margin-top: 50px;
           bottom: 100px;
       }
       .pdf-btn{

           display: flex;
           margin-bottom: 60px;
           justify-content: center;
           bottom: 70px;

       }
   </style>
    </head>
    <body>
    <?php
       include "header.php";
    ?>

<section>

    <div class="container-fluid">
                   <div class="row justify-content-center">
                     <?php if(isset($_SESSION['response'])){?>

                   <div class="alert alert-<?= $_SESSION['res_type'] ; ?> alert-dismissible text-center">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                           <?= $_SESSION['response'] ;?> 
                                </div>

                     <?php      }  unset($_SESSION['response']) ?>
                    </div>
        <div class="row" style="margin-left:1px;">
           <div calss="col-md-4">
                <h3 class="text-center text-success p-2" style="font-size:30px">Add Doctor</h3>
                    <form method="POST" action="action_admin.php" enctype="multipart/form-data" >
            
                                   <div class="form-group">
                                    
                                   <input name="did" class="form-control" type="text" placeholder="Enter the Docotor Id"  value="<?= $did;?>" required>
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
                                        <input name="image" class="custom-file" type="file" value="<?php echo $imageold;?>" required>
                                        
                                    </div>
                                    <div class="form-group">
                                        <?php

                                        if($update == true){
                                            ?>
                                        <input type="submit" name="update-doctor" class="btn btn-success"   value="update" required>
                                        <?php }
                                        else{
                                            ?>
                                        <input type="submit" name="add-doctor" class="btn btn-primary"   value="submit" required>
                                        <?php } ?>
                                    </div>                    
                        </form>
            </div>
                    <div class="col-md-8" style="bottom:5px;">
                     <?php 
                         $show = "SELECT DID,NAME,ADDRESS,PHONE,DEPT FROM doctor";
                         $result = $conn->query($show);
                        

                    ?>
                            <div class="table-wrapper">
                                    <table class="table hover-table text-center ml-auto">
                                                <thead>
                                                <tr>
                                                    <th>Did</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Dept</th>
                                                    
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                     if($conn->affected_rows > 0)
                                                     while($row = $result->fetch_assoc()){
                                                    
                                                    ?>
                                                    <tr>
                                                    <td><?=$row['DID']?></td>
                                                    <td><?=$row['NAME']?></td>
                                                    <td><?=$row['ADDRESS']?></td>
                                                    <td><?=$row['PHONE']?></td>
                                                    <td><?=$row['DEPT']?></td>
                                                    
                                                    <td>
                                                    <a href="add_doctor.php?edit-doctor=<?=$row['DID'];?>" class="badge badge-success p-2">Edit</a> |
                                                    <a href="action_admin.php?delete-doctor=<?=$row['DID'];?>" onclick="return confirm('Do You want to delete this record?');" class="badge badge-danger p-2">Delete</a></td>
                                                    </tr>  
                                                    <?php } ?>
                                                </tbody>
                                                    
                                           </table>
                                 </div>
                                        <div class="row justify-content-center text-cente" >
                                                <button type="submit" class="btn btn-info p-2" name="pdf">download pdf</button>
                                           </div>
                 </div>
        </div>               

 </div>               
                        
       
       
                                                    
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        </section>
        </body>
        <?php include 'footer.php' ?>
    
</html>