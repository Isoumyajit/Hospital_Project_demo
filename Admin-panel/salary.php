                  <?php 
                  session_start();
                include  'config_admin.php' ?>


<html>

<head>     
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Ubuntu:400,500,700&display=swap" rel="stylesheet">
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
                            padding: 11rem 0;
                       }
                       .table-wrapper {
                                height: 400px;
                                /* background-color: orange; */
                                overflow: auto;
                                margin: 10px;
                                width: 900px;
                                margin-top: 27px;
                                margin-right: 1px;
                            }
        </style>

</head>
<?php include 'header.php' ?>

<body>
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
           <div class="col-md-8" style="margin-right:20px;left:5px; bottom:20px;top:40px;left:20px;">
                     <?php 
                         $show = "SELECT SID,NAME,DEPT,MONTHNAME(CURRENT_DATE) AS MONTH,DATE AS PREVIOUS, CURRENT_DATE  FROM salary_manage WHERE CURRENT_DATE > LAST_DAY(DATE) ";
                         $result = $conn->query($show);
                     ?>
                            <div class="table-wrapper">
                                    <table class="table hover-table text-center" style="width:900px">
                                        <thead>
                                                <tr>
                                                    <th>Saff_Id</th>
                                                    <th>Name</th>
                                                    <th>Department</th>
                                                    <th>Month</th>
                                                    <th>Previos</th>
                                                    <th>TODAY</th>
                                                    <th>Action</th>
                                                </tr>
                                        </thead>
                                                <tbody>
                                             <?php    if($conn->affected_rows > 0)
                                            while($row = $result->fetch_assoc()){  ?>
                                                    <tr>
                                                    <td><?=$row['SID']?></td>
                                                    <td><?=$row['NAME']?></td>
                                            
                                                    <td><?=$row['DEPT']?></td>
                                                    <td><?=$row['MONTH']?></td>
                                                    <td><?=$row['PREVIOUS']?></td>
                                                    <td><?=$row['CURRENT_DATE']?></td>
                                                    <td>
                                                    <a href="action_admin.php?approve-salary=<?=$row['SID'];?>" class="badge badge-success p-2">Approve</a> |
                                                    <a href="action_admin.php?delete-salary=<?=$row['SID'];?>" onclick="return confirm('Do You want to delete this record?');" class="badge badge-danger p-2">Delete</a></td>
                                                    </tr>  
                                                    <?php  } ?>
                                                </tbody>
                              
                                           </table>
                                 </div>
                 </div>
        </div>               

 </div>   
</section>

</body>    
<?php include 'footer.php' ?>        
</html>