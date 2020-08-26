<?php
session_start();
 if(!isset($_SESSION['uname']))
 {
     header('location:admin_login.php');
 }
 $connect = new mysqli("localhost", "root", "", "hospital_demo");  
 $query ="SELECT NAME,ADDRESS,GENDER,PHONE,EMAIL,DATE FROM patient_data ORDER BY PID DESC";  
 $result = $connect->query($query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Medica</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
           <link rel="stylesheet" href="admin.css"> 

           <style>
                  section {
                         background: whitesmoke;
                         background-size:cover;
                         /* height:100%; */
                         padding: 10rem;
                         display:flex;
                         flex-direction: column;
          
                          }  
                .table-wrapper {
                        padding:11rem 0;
                        height: 300px;
                        overflow: auto;
                        margin: 20px;
                        margin-right: 1px;
                        bottom:600px;
                        width: 800px;
                    }   

           </style>
      </head>  
      <body>  
          <section>
          <?php
          include 'header.php';
           ?>
           <div class="container main-body"> 
               <br>
                <div class="table-responsive table-wrapper">  
                     <table id="employee_data" class="table table-striped table-bordered text-center" style="width:100% ;">  
                          <thead>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Address</td>  
                                    <td>Gender</td>  
                                    <td>Phone</td>  
                                    <td>Email</td> 
                                    <td>Date</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          if($connect->affected_rows > 0)
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["NAME"].'</td>  
                                    <td>'.$row["ADDRESS"].'</td>  
                                    <td>'.$row["GENDER"].'</td>  
                                    <td>'.$row["PHONE"].'</td>  
                                    <td>'.$row["EMAIL"].'</td>
                                    <td>'.$row["DATE"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
     
          </section>
      </body> 
      <?php include 'footer.php' ?> 
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  