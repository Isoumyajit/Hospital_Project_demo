<?php 
session_start();
if(!isset($_SESSION['uname'])){
    
    header('location:admin_login.php');
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Ubuntu:400,500,700&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="admin.css">
    <style>
       body{
        font-family: 'Oxygen', sans-serif;

       }
        span{
            text-align: left;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <!-- NAVIGATION -->
    <?php 
        $firstBtn = "Admin Portal";
        include "header.php"; 
    ?>

    <!-- CONTENT AREA -->
 <div class="content-area">
        <!-- SIDE BAR -->
        <?php include "sidebar.php";
              include 'config_admin.php';
              $doctor = "SELECT COUNT(doctor) FROM doctor_time";
              $count = "SELECT COUNT(tid) from test_details where DATE < timestamp(CURRENT_DATE)";
              $today = "SELECT COUNT(tid) from test_details where DATE > timestamp(CURRENT_DATE)";
              $resultset=$conn->query($today);
              $result =  $conn->query($count);
              $doc = $conn->query($doctor);
              $row2 = $doc->fetch_assoc();
              $row = $result->fetch_assoc();
              $row1= $resultset->fetch_assoc();
        ?>

        <!-- MAIN BODY -->
        <main class="main-body">
     <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8"  style="left:80px; bottom:50px;">
            <div class="row pt-md-5 mt-md-3 mb-5">
              <div class="col-xl-6 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-syringe fa-3x text-warning"></i>
                      <div class="text-right text-secondary text-info">
                       <h10><?php echo $row1['COUNT(tid)'] ?></h10> <h5>Today's Tests</h5>
                        <h3>See here</h3>
                      </div>
                    </div>
                  </div>
                  <div class="text-right card-footer text-center text-info ">
                  <span><button type="button" class="btn btn-success p-2" style="right:10px;" onclick="Todaytest()">Search</button>Search</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-heartbeat fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                     <strong class="text-danger"><h8><b><?php echo $row['COUNT(tid)']?></b></h8></strong> <h5>Pending Tests</h5>
                        <h3>See Here</h3>
                      </div>
                    </div>
                  </div>
                  <div class="text-right card-footer text-center text-info ">
                  <span><button type="button" class="btn btn-danger p-2" style="right:10px;" onclick="duetest()">Search</button>Search</span>
                  </div>
                  </div>
                </div>
              <div class="col-xl-4 col-sm-4 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-users fa-3x text-info"></i>
                      <div class="text-right text-success p-3" style="font-size:15px">
                        <h5>Todays Appointments</h5>
                        <h3>See</h3>
                      </div>
                    </div>
                  </div>
                  <div class="text-right card-footer text-center text-info ">
                  <span><button type="button" class="btn btn-success p-2" style="right:10px;" onclick="todayappointment()">Search</button>Search</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 p-2" style="left:3px;">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-stethoscope fa-3x text-danger"></i>
                      <div class="text-right text-warning p-3">
                        <h5>Due Appointents</h5>
                        <h3>See Here</h3>
                      </div>
                    </div>
                  </div>
                  <div class="text-right card-footer text-center text-info ">
                  <span><button type="button" class="btn btn-success" style="right:10px;" onclick="todayappointment()">Search</button>Search</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 p-2" style="left:3px;">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-user-md fa-3x text-warning"></i>
                      <div class="text-right text-danger">
                        <h4>Total <h8><?php echo $row2['COUNT(doctor)']." " ?></h8></h4>
                        <h5>Search Doctor Times Instantly</h5>
                        <h3>See Here</h3>
                      </div>
                    </div>
                  </div>
                  <div class="text-right card-footer text-center text-info ">
                  <span><button type="button" class="btn btn-success p-2" style="right:10px;" onclick="doctor_search()">Search</button>Search</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of cards -->
<section>
    <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-10 col-md-8" style="bottom:70px; left:70px;">
            <div class="row align-items-center mb-5">
              <div class="col-xl-7">
                <h4 class="text-success mb-4" style="font-size:20px;">Recent Customer Activities</h4>
                
                                   <?php
                                     $query = "SELECT * FROM rating";
                                     $result = $conn->query($query);
                                     $i=1;
                                     while($row  = $result->fetch_assoc()){
                                      
                                   ;?>
             <div class="accordion" id="my-accordion">
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-info text-left" style="font-size:15px;" data-toggle="collapse" data-target="#collapseOne">
                        <img src="<?php $row['PHOTO'];?>" width="50" class="mr-3 rounded">
                        <?php echo $row['Feedback'] ;?> posted a new comment
                      </button>
                    </div>
                    <div class="collapse show" id="collapseOne" data-parent="#myaccordion">
                      <div class="card-body">
                        <?php  echo $row['review'];?>
                      </div>                      
                    </div>
                </div>
                                     <?php  } ?>
                                     
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

</main>
    </div>
      <!-- footer -->
  <!-- Copyright -->
<!-- Footer -->
<?php include 'footer.php' ?>

    <!-- end of footer -->
    <script>

    function Todaytest(){
        window.location.href="today_test.php";
    }
    function duetest(){
      window.location.href="due_test.php";
    }
    function doctor_search(){
        window.location.href = "search_doctor.php";
    }
 
    ("<#my-accordion>").show();
    jQuery('document').ready(function() {
    jQuery('#my-accordion').on('show hide', function() {
        jQuery(this).css('height', 'auto');
    });
    jQuery('#my-accordion').collapse({ parent: true, toggle: true }); 
});

$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip();
})

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>