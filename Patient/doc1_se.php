<?php 
    session_start();
    if(!isset($_SESSION['pid'])){
           header("location:index.php");     
    }
?>
<html>

<head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
           <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">
           
           <style>

                    #myTable {
                      border-collapse: collapse;
                      width: auto;
                      
                      font-size: 18px;
                      border-color: yellow;
                      border-radius: 0px;
                    overflow: auto;

                    }
                    #myTable th, #myTable td {
                      text-align: center;
                      padding: 20px;
                      border-radius: 0px;
                      border-collapse: collapse;
                      font-family: 'Nunito', sans-serif;

                    }
                    #myTable td{
                      border-radius: 0px;
                      border-collapse: collapse;
                    overflow: auto;
                    font-family: 'Nunito', sans-serif;

                    }

                    #myTable tr {
                      border-collapse: collapse;
                      border-color: yellow;
                    }

                    #myTable tr.header, #myTable tr:hover {
                      background-color: lightblue;
                    }
                    #div22{
                      font-weight: bold;
                      
                      font-size: 35px;
                      text-align: center;
                    }
                    #t4
                    {
                      text-align: left;
                      font-weight: bolder;
                      font-size: 20px;

                    }

                    #sec1,#sec2{
                      padding: 1rem;
                      width: auto;
                    }
                    #sec1{
                      padding-top: 0rem;
                    }
                  .table-wrapper {
                        padding:5rem 0;
                        height: device-width;
                        /* background-color: orange; */
                        overflow: auto;
                        margin: 10px;
                        margin-top: 27px;
                        margin-right: 10px;
                        bottom:500px;
                        height: 400;
                  }
                    body{
                    font-family: 'Nunito', sans-serif;
                       }
                      .f-div{
                          background-color: black;
                          height: 100px;
                          
                      }


            </style>
</head>
<body>



   <div class="w3-sidebar w3-light-grey w3-bar-block" id="div22" style="width:15%">
       <h2 class="w3-bar-item" style="color:green">Departments</h2>
               <table id="t4" cellpadding="6" border="0">
    
    
    

     <?php 
                $conn = mysqli_connect("localhost", "root", "", "hospital_demo");
                if($conn-> connect_error)
                { 
                  die("connection failed!". $conn-> connect_error);
                }     
                $sql = "SELECT distinct DEPT from doctor";
              
                $result = $conn-> query($sql);
                  
                if($result-> num_rows >0 )
                {
                  while($row=$result-> fetch_assoc())
                  {
                  
              echo '<tr><td>'. $row["DEPT"] . '</td></tr>';
                  }
              echo "</table>";
              }
                else
                {
                  echo "0 result";
                }

                $conn-> close();
         ?>


  </table>
</div>


<div id="div100" style="margin-left: 15%">
<section id="sec1" style="background-size: cover;"><div><h1 style="color: black;">Doctors</h1></div></section>
<div class="w3-container">
<section id="sec2">
<div class="table-responsive table-wrapper">

<table id="myTable" border="0" cellpadding="0" align="center" class="table table-striped table-bordered">
  <thead>
  <tr class="header">
    <th style="width: auto;">Image</th>
    <th style="width:auto;">Name</th>
    <th style="width:auto;">Dept</th>
    <th style="width:auto;">Days</th>
    <th style="width:auto;">Time</th>
    <th style="width:auto;">Rating</th>
    <th style="width:auto;">For Details</th>
    
  </tr>
</thead>

  <?php 
  $conn = mysqli_connect("localhost", "root", "", "hospital_demo");
  if($conn->connect_error)
  {
    die("connection failed!". $conn->connect_error);
  }     
  $sql = "SELECT b.email,b.image,a.DID,a.DOCTOR,a.DEPT,a.days,a.time  from  doctor b ,doctor_time a where a.DID = b.DID";
 $sql1 = "Select DID from doctor";
  $result = $conn-> query($sql);
    
  if($result->num_rows >0 )
  {
    while($row = $result-> fetch_assoc())
    {

      $id= $row["DID"];
      $find = "SELECT round(avg(rate),1) as AVG from rating where DID = '$id' GROUP BY('$id')";
      $f = $conn->query($find);
      $res = $f->fetch_assoc();
      if(!$res)
       { 
      echo '<tr><td><img src="../Admin-panel/'.$row['image'].'" width="100" height="80"alt=""></td><td>'. $row["DOCTOR"] . '</td><td>'. $row["DEPT"] . '</td><td>' .   $row["days"] .'</td><td>'. $row["time"]. '</td><td>'."No Reviews Yet".'</td><td>'.'<a class="btn btn-warning" href="Details.php?var='.$id.'">View</a></td></tr>';
          }
      else
      {
        echo '<tr><td><img src="../Admin-panel/'.$row['image'].'" width="100" height="80"alt=""></td><td>'. $row["DOCTOR"] . '</td><td>'. $row["DEPT"] . '</td><td>' .   $row["days"] .'</td><td>'. $row["time"]. '</td><td>'. $res['AVG']. '/5</td><td>'.'<a class="btn btn-warning" href="Details.php?var='.$id.'">View</a></td></tr>';
      }?>
                       
    <?php } 
      echo "</table>";
      }
          else
          {
            echo "0 result";
          }

          $conn-> close();
  ?>

</table>
</div>
</div>
</div>
</section>
</body>
<?php include 'footer.php'?>
</html>

<script>
    $(document).ready(function(){  
        $('#myTable').DataTable();  
     });  
 </script> 