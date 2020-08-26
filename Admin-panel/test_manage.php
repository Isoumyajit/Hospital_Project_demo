<?php
 
 include 'action_admin.php';


?>


<!-- <!DOCTYPE html>
<![if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Ubuntu:400,500,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/admin.css">
   <style>
       section {
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(bg.jpg);
    background-size:cover;
    height:100%;
    padding: 11rem 0;
       }

       /* .navbar-customize {
           position: fixed;
           
       } */
       .form{

 width: 197px;
 height: 500px;
 margin: auto;
 position: relative;
 font-size: 1.7rem;

       }

       .table-wrapper {
           height: 400px;
           /* background-color: orange; */
           overflow: auto;
           margin: 10px;
           width: auto;
           margin-top: 27px;
           margin-right: 1px;
       }
       
   </style>
    </head>
    <body>
    <?php
      
      include 'header.php';
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
        <div class="row p-2" style="margin-left:10px; top:5px;">
              <div calss="col-md-4" >
                   <h3 class="text-center text-info">Add Record</h3>
                          <form method="POST" action="action_admin.php" class="form" enctype="multipart/form-data">
                                   <div class="form-group">
                                                <input name="tid" class="form-control" type="text" placeholder="Enter the Test_Id" value="<?= $tid;?>" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <input name="name" class="form-control" type="text" placeholder="Enter the name"  value="<?= $name;?>" required>
                                                
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
                                                <input name="test" class="form-control" type="text" placeholder="Enter the test" value="<?= $test;?>" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <input name="payment" class="form-control" type="text" placeholder="Enter the payment" value="<?= $pay;?>" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <?php

                                                if($update == true){
                                                    ?>
                                                <input type="submit" name="update" class="btn btn-success"   value="update" required>
                                                <?php }
                                                else{
                                                    ?>
                                                <input type="submit" name="add" class="btn btn-primary"   value="submit" required>
                                                <?php } ?>

                                                 </div> 
                                      
                                  </form>
                     </div>
           
                <div class="col-md-10">
                            <?php 
                                $show = "SELECT TID,NAME,PHONE,TEST,DATE,PAYMENT FROM TEST_DETAILS";
                                $result = $conn->query($show);

                            ?>
                          <div class="table-wrapper">
                                <table class="table hover-table text-center"style="bottom:50px;">
                                                <thead>
                                                <tr>
                                                    <th>TID</th>
                                                    <th>Name</th>
                                                    <!-- <th>Email</th> -->
                                                    <th>Phone</th>
                                                    <th>test</th>
                                                    <th>DATE</th>
                                                    <th>Payment</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                    
                                                     while($row = $result->fetch_assoc()){
                                                         
                                                         ?>
                                                    <tr>
                                                    <td><?=$row['TID']?></td>
                                                    <td><?=$row['NAME']?></td>
                                            
                                                    <td><?=$row['PHONE']?></td>
                                                    <td><?=$row['TEST']?></td>
                                                    <td><?=$row['DATE']?></td>
                                                    <td><?=$row['PAYMENT']?></td>
                                                    <td>
                                                    <a href="test_manage.php?edit=<?=$row['TID'];?>" class="badge badge-success p-2">Edit</a> |
                                                    <a href="action_admin.php?delete=<?=$row['TID'];?>" onclick="return confirm('Do You want to delete this record?');" class="badge badge-danger p-2">Delete</a></td>
                                                    </tr>  
                                                    <?php } ?>
                                                </tbody>
                                     </table>
                             </div>
                    
                                                       
                                                        <div class="text-center">
                                                        <a href="../fpdf182/output.php?pdf=2" class="badge badge-warning p-3">Download Pdf</a>
                                                        </div>
                                                     <br>
                                                 <br>
                                                    
                
                  </div>
        </div>
 </div>
                
        </section>
        
    </body>
    <?php  include 'footer.php' ?>
</html>