<?php session_start();?>
<html>
   <head >
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="css/admin.css">
       <style>
.profile {
    background: slateblue;
    background-blend-mode: overlay;
    scrollbar-base-color: blanchedalmond;
}
       </style>
     
   </head>
   <?php include 'header.php';?>
    <body class="profile">
        
                <div class="container profile" style="padding : 11rem;">    
                      <div class="row justify-content-center">
                           <div class="col-md-6 mt-3 bg-info p-4 rounded">
                                <div class=text-center> 
                               <img src="DSCN0746.jpg" width="300" class="img-thumbnail"> </div>

                                <h2 class="bg-light p-2 rounded text-center text-dark"><?php echo $_SESSION['uname']?></h2>
                                <h3 class="text-align">Desigantion : Admin</h3>
                                <h3 class="text-align">  Job : Admin at Medica superspeciality Hospital</h3>
                                <h3 class="text-align"> Email :<?php echo $_SESSION['email'] ?></h3>
                                
                           </div>
                      </div>

                       
                </div>
     </body>


<?php include 'footer.php'?>


</html>