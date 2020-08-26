<?php
  session_start();
 if(!isset($_SESSION['uname']))
 {
     header('location:admin_login.php');
 }

 $connect = new mysqli("localhost", "root", "", "hospital_demo");  
 $query ="SELECT TID,NAME,ADDRESS,PHONE,TEST,PAYMENT FROM test_details WHERE DATE > TIMESTAMP(CURRENT_DATE) ORDER BY DATE DESC";  
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
           <link rel="stylesheet" href="admin.css"> 

           <style>
                 section {
                         background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(bg.jpg);
                         background-size:cover;
                         height:100%;
                         padding: 11rem;
                         display:flex;
                         flex-direction: column;
                          }  

     .table-wrapper {
          padding:10rem 0;
           height: 400px;
           /* background-color: orange; */
           overflow: auto;
           margin: 10px;
           margin-top: 27px;
           margin-right: 1px;
           bottom:200px;
       }   
           </style>
      </head>  
      <body>  
          <?php
          include 'header.php';
           ?>
     <section>
           <div class="container-fluid"> 
                <div class="table-responsive table-wrapper">  
                     <table id="test_data" class="table table-striped table-bordered text-center" style="width:1000px; bottom:200px">  
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
           </section>
      </body>  
     
                 <?php  include 'footer.php' ?> 
                 
 <script>  
 $(document).ready(function(){  
      $('#test_data').DataTable();  
 });  
 </script>  
  </html> 