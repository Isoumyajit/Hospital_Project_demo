
    <!DOCTYPE html>
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Doctor's Details</title>
    <!-- <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">



   </head>
<body class="">
   <div role="navigation" class="navbar navbar-default navbar-static-top">
            <div class="container">
              <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="doc1_se.php" class="navbar-brand">BACK</a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="http://www.phpzag.com">Home</a></li>
                
                </ul>
              
              </div><!--/.nav-collapse -->
            </div>
    </div>
  
  <div class="container" style="min-height:700px;">
          <div class=''>
          </div>
        <div class="container"> 
          <h2>Details</h2>
          <div class="row" >
            <div class="col-lg-3 col-sm-6">
              <?php
              if (isset($_GET['var'])) 
              {
                $var = $_GET['var'];# code...
            
            $conn = mysqli_connect("localhost", "root", "", "uni");
        
        $sql = "SELECT D_id,Name,Dept,Mail,Days,Time from doctor where D_id= $var ";

            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));      
            while( $record = mysqli_fetch_assoc($resultset) ) {
              $id = $record["D_id"];
            ?>
                  <div class="card hovercard card-user">
                      <div class="cardheader">               
                <div class="avatar">
                  <img alt="" src= "1.jpg">
                </div>
              </div>
                <div class="card-body info">
                    <div class="title">
                        <a href="#"><?php echo $record['Name']; ?></a>

                    </div>
                     <div class="title">
                        <a href="#"><?php echo $record['Dept']; ?></a>
                    </div>
                     <div class="title">
                        <a href="#"><?php echo $record['Mail']; ?></a>
                    </div>
                     <div class="title">
                        <a href="#"><?php echo $record['Days']; ?></a>
                    </div>
					 <div class="title">
                        <a href="#"><?php echo $record['Time']; ?></a>
                    </div>
                </div>
                <div class="card-footer bottom">
                    
                    
                   
                                      
                </div>
            </div>
     
        </div>
  </div>  
  <div style="margin:50px 0px 0px 0px;">
    
      
   

    
     <?php   }}?>  
     <!-- <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="confirm.php?var='.$id.'">Book</a> -->
        <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-user-plus" aria-hidden="true"></i>BOOK</a>
  </div>
</div>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>





                      <div class="modal fade" id="Modal_login" ro="dialog">
                        <div class="modal-dialog">
                          
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                            <?php
                                include "confirm.php";
    
                            ?>
          
                            </div>
                            
                         </div>
                          
                        </div>
                      </div>











</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>






</html>