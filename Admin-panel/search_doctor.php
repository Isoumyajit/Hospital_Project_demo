<?php
session_start();
 if(!isset($_SESSION['uname']))
 {
     header('location:admin_login.php');
 }
 $connect = new mysqli("localhost", "root", "", "hospital_demo");  
 $query ="SELECT doctor,dept,days,time FROM doctor_time";  
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
                         height:100%;
                         padding: 10rem;
                         display:flex;
                         flex-direction: column;
                          }  
                .table-wrapper {
                        padding:11rem 0;
                        height: 400px;
                        overflow: auto;
                        margin: 20px;
                        margin-right: 1px;
                        bottom:300px;
                    }   


           </style>
      </head>  
      <body>  
          <section>
          <?php
          include 'header.php';
           ?>
           <div class="container-fluid"> 
                <br/>  
                <div class="table-responsive table-wrapper">  
                     <table id="doctor_data" class="table table-striped table-bordered text-center" style="width:1000px; bottom:290px">  
                          <thead>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>DEPARTMENT</td>  
                                    <td>DAYS</td>  
                                    <td>TIME</td>  
                                   
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["doctor"].'</td>  
                                    <td>'.$row["dept"].'</td>  
                                    <td>'.$row["days"].'</td>  
                                    <td>'.$row["time"].'</td>  
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
      $('#doctor_data').DataTable();  
 });  
 </script>  