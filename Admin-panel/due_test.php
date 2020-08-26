<?php
  session_start();
 if(!isset($_SESSION['uname']))
 {
     header('location:admin_login.php');
 }

 $connect = new mysqli("localhost", "root", "", "hospital_demo");  
 $query ="SELECT TID,NAME,ADDRESS,PHONE,TEST,PAYMENT FROM test_details WHERE DATE < TIMESTAMP(CURRENT_DATE) ORDER BY DATE DESC";  
 $result = $connect->query($query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Medica</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
           <link rel="stylesheet" href="css/admin.css"> 

           <style>
                    
           </style>
      </head>  
      <body>  
          <?php
          include 'header.php';
           ?>
           <div class="container-fluid main-body"> 
                <div class="table-responsive table-wrapper text-center" style="width:800px; margin-left:100px">  
                     <table id="employee_data" class="table table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>TID</td>  
                                    <td>NAME</td>  
                                    <td>ADDRESS</td>  
                                    <td>PHONE</td> 
                                    <td>TEST</td>
                                    <td>PAYMENT</td>
                                   
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = $result->fetch_assoc())  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["TID"].'</td>  
                                    <td>'.$row["NAME"].'</td>  
                                    <td>'.$row["ADDRESS"].'</td>  
                                    <td>'.$row["PHONE"].'</td> 
                                    <td>'.$row["TEST"].'</td>   
                                    <td>'.$row["PAYMENT"].'</td>
                                    
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  

      <?php include 'footer.php' ?>
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  