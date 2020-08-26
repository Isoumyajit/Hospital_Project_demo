<?php 
    session_start() ;
    include '../Admin-panel/config_admin.php';
       
          $c = 0;
          $var = $_GET['var'];# code...
          if (isset($_GET['var'])) {
            echo $_GET['var'];
            if(isset($_POST['submit'])){
            $var = $_GET['var'];
            $uid = $_SESSION['pid'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $insert = "INSERT INTO cart(UID,DID,BOOKING,prefered_time) VALUES('$uid','$var','$date','$time')";
            $conn->query($insert);
            if($conn->affected_rows > 0)
               header("location:Thank_you.php?var=$uid");
             else 
               echo "Something Went Wrong";
            }

                          }
      
      $id = $_SESSION['pid'];
      $f = 1;
      $check= "SELECT UID FROM rating where UID = '$id' AND DID = '$var'";
      $easy = $conn->query($check);
      if($conn->affected_rows > 0)
           $f = 0;
         
        
	    if(isset($_POST["rating"]) && $f == 1){
         if(!isset($_SESSION['pid']))
              {
                header("location:index.php");
              }
		 $feed = $_POST['feedback'];
		 $review = $_POST['review'];
     $rat = $_POST['rating'];
     
		 $sql = "INSERT INTO rating(UID,DID,Feedback,review,rate) values('$id','$var','$feed','$review','$rat')";
		 $result = $conn->query($sql);
		 if($conn->affected_rows > 0)
		   {
        $avg = "SELECT round(avg(rate),1) as AVG from rating where DID = '$var' GROUP BY('$var')";
        $primary_check = "SELECT DID FROM rating where DID = '$var' AND UID = '$id'";
        $conn->query($primary_check);
        if($conn->affected_rows){
        $comp = $conn->query($avg);
        $result_avg = $comp->fetch_assoc();
        $result_average = $result_avg['AVG'];
        $rate = "INSERT INTO rate_order(DID,rate) values('$var','$result_average')";
        $aver = $conn->query($rate);
			    $msg = "<div class='alert alert-success'>Thank you for Your response<button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
                                }
      }
       else{
         $msg = "<div class= 'alert alert-danger'>Something Went wrrong<button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
       }
      }
      if(isset($_POST['update']) && $f == 0 )
       {  
           $rating = $_POST['rating'];
           if(!$rating)
                 $rating = $c;
           $feed = $_POST['feedback'];
           $review = $_POST['review'];
            $update = "UPDATE rating set FEEDBACK = '$feed' , review = '$review' , rate='$rating' where UID = '$id' AND DID  = '$var'";
            $res = $conn->query($update);
            if($conn->affected_rows > 0)
            {
              $avg = "SELECT round(avg(rate),1) as AVG from rating where DID = '$var' GROUP BY('$var')"; 
              $comp = $conn->query($avg);
              $result_avg = $comp->fetch_assoc();
               $avg_update = $result_avg['AVG'];
              $rate = "UPDATE  rate_order SET rate='$avg_update' WHERE DID = '$var'";
              $aver = $conn->query($rate);
               $msg = "<div class='alert alert-warning'>Response Updated<button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
              
            }
            else{
              $msg = "<div class= 'alert alert-danger'>Something Went wrrong<button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
            }
       }

      
	                      
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor's Details</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <!-- <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'> -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   

<link href="css/card.css" rel="stylesheet">
<style>
			.card{
        width: 430px;
			}
      
      .card-holder{
        display: inline;
        
      }
     
         .fa-facebook {
          color: rgb(59, 91, 152);
         }
        .card-row{
          
            background-color: whitesmoke;

        }
        .card-data{
            background-color: #23D5AD;
            font-family: 'Nunito', sans-serif;
        }
       .info{

           background: linear-gradient(90deg, rgba(2,0,.6,1) 0%,);
           font-family: 'Nunito', sans-serif;
       }
   
      body{
        font-family: 'Nunito', sans-serif;
        color:  red;
        font-weight: 100;
        color:#fff;
        background:  linear-gradient(-45deg, #EE7752 , #E73C7E , #23A6D5 , #23D5AB);
        background-size: 400% 400%;
        position: relative;
      }
     
      body{
            margin-top: 30px !important;
            background-color:#F2EFE8 !important;
        }
        h3,p{
            margin: 0 !important;
        }
        a:hover,a:focus{
            text-decoration: none !important;
            outline: none !important;
        }
        .testimonial{
            text-align: center;
            color: #F2EFE8;
            margin:80px 30px;
            padding: 30px 40px;
            border-radius:30px;
            position: relative;
            z-index: 1;
        }
        .testimonial:before{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #424242;
            border-radius:30px;
            z-index: -1;
        }
        .testimonial:after{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #FB8C00;
            border-radius:30px;
            transform:rotate(-7deg);
            z-index: -2;
        }
        .testimonial .pic{
            border: 5px solid #F2EFE8;
            display: inline-block;
            margin-bottom: 10px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .testimonial .pic img{
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
        .testimonial .testimonial-content{
            font-size: 15px;
            letter-spacing: 1px;
            line-height: 30px;
            margin-bottom: 20px;
        }
        .testimonial .testimonial-title a{
            display: inline-block;
            color: #FB8C00;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .testimonial .testimonial-title small{
            color: #F2EFE8;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: capitalize;
        }
        .owl-theme .owl-controls{
            margin-top: 0px;
            margin-left: 10px;
            text-align: center;
        }
        .owl-theme .owl-controls .owl-buttons div{
            display: inline-block;
            opacity:1;
            background:#FB8C00;
            color: #F2EFE8;
            border-radius: 0;
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin-right: 5px;
        }
        .owl-prev:before,
        .owl-next:before{
            content: "\f060";
            font-family: 'FontAwesome';
            font-size: 20px;
        }
        .owl-next:before{
            content: "\f061";
        }
	</style>
</head>
<body >
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
  
  <div class="container">
  <!-- <div class=''>
  </div> -->
<div class="container card-holder"> 
    <h2>Details</h2>
    <div class="row card card-row">
      <div class="col-lg-2 col-sm-4 card-cover">
        <?php
     
       $conn = mysqli_connect("localhost", "root", "", "hospital_demo");
  
      $sql = "SELECT b.email,b.image,a.DID,a.DOCTOR,a.DEPT,a.days,a.time from  doctor b ,doctor_time a  where a.DID = b.DID AND a.DID = '$var'";
      $avg = "SELECT round(avg(rate),1) as AVG from rating where DID = '$var' GROUP BY('$var')"; 
      
      $comp = $conn->query($avg);
      $result_avg = $comp->fetch_assoc();
      $resultset = $conn->query($sql);      
      while($record = $resultset->fetch_assoc() ) {
      ?>
            <div class="card hovercard ">
                <div class="cardheader card-upper">               
                <div class="avatar">
            <?php echo '<img src="../Admin-panel/'.$record['image'].'" width="100" height="80"alt="">'; ?>
          </div>
              </div>
                <div class="card-body info">
               
                    <div class="title">
                        <p><?php echo $record['DOCTOR']; ?></p>
                    </div>
                     <div class="title">
                        <p><?php echo $record['DEPT']; ?></p>
                    </div>
                     <div class="title">
                        <p><?php echo $record['days']; ?></p>
                    </div>
                     <div class="title">
                        <p><?php echo $record['time']; ?></p>
                    </div>
                    <div class="title">
                        <p class="text-danger"><?php if($result_avg)echo $result_avg['AVG']."/5";else echo "No Reviews" ?></p>
                    </div>
                <?php if($result_avg) {   ?>
                     <div class="title" id="rateYo-show" style="left:100px">
                        
                    </div>
                <?php } ?>
                </div>
                      <div class="card-footer bottom">
                      <span style="font-size: 3em; color: Tomato;">
                        <i class="fab fa-facebook"></i>
                      </span>

                      <span style="font-size: 3em; color: Dodgerblue;">
                        <i class="fab fa-twitter"></i>
                      </span>
                        <span style="font-size: 3em;color: Mediumslateblue;">
                        <i class="fab fa-vk"></i>
                        </span>  
                        <span style="font-size: 3em; color : red">
                        <i class="fab fa-google-plus"></i>
                        </span>
 
                      </div>
                      <div>
                      <a href="" data-toggle="modal" data-target="#Modal_login" class="btn btn-success p-2">BOOK</a> 
                      </div> 
                    <script>     
                      $(function () {
                                
                                $("#rateYo-show").rateYo({
                                
                                rating : <?php echo $result_avg['AVG'] ; $c =$result_avg['AVG'] ?>,
                                readOnly:true,

                                });
                                }); 
                      </script>
            </div>
      <?php } ?>             
        </div>
  </div>     
     
  <div class="col-lg-5 col-sm-9" style="left:600px; right:60px ; bottom: 570px ; width:400px"> 
                <?php 
                   if(isset($msg))
                      echo $msg;
                    if($f == 1){
              ?>
        
        <label for=""><h2>Review</h2></label>     
            <div class="card hovercard">
                <div class="card-body info">
               
                <form action="" method="POST" style="text-align:center;">
								<div class="form-group" style="text-align:center;">
							       <label for="">Rating</label>
									    <div class="rating" id="rateYo-insert"></div>
							         	</div>
									<div class="form-group">
									    <label for="">Feedback</label>
										<input type="text" class="form-control" name="feedback" placeholder="please give feedback">	
										<input type="hidden" class="form-control" name="rating" id="rating" placeholder="please give feedback">	
								   
								    </div>
									<div class="form-group">
									    <label for="">Review (optional)</label>
										<textarea name="review" class="form-control" rows="5" id="comment" placeholder="Write your thoughts"></textarea>
								   
								    </div>
                  <script>
                                          
                                      
                                $(function () {
                                
                                $("#rateYo-insert").rateYo({
                                
                                onSet: function(rating,rateYoInstance){
                                  $("#rating").val(rating);
                                }

                                });
                                });
                  
                  </script>
									<button class="btn btn-success" name="submit-res">Submit Response</button>
                  
						     </form> 
                    <?php  }
                    else
                    { 
                       $update = "SELECT * FROM rating where UID = '$id' AND DID= '$var' ";
                       $result = $conn->query($update);
                       $rs = $result->fetch_assoc();
                      ?> 
              
        <label for=""><h2>Your Review</h2></label>     
            <div class="card hovercard">
                <div class="card-body info">
               
                <form action="" method="POST" style="text-align:center;">
								<div class="form-group" style="text-align:center;">
							       <label for="">Rating</label>
									    <div class="rating" id="rateYo-up">  
                           
								       </div>
								</div>
									<div class="form-group">
									    <label for="">Feedback</label>
										<input type="text" class="form-control" name="feedback" placeholder="<?php echo $rs['Feedback']?>">	
										<input type="hidden" class="form-control" name="rating" id="rating" placeholder="please give feedback">	
								   
								    </div>
									<div class="form-group">
									    <label for="">Review (optional)</label>
										<textarea name="review" class="form-control" rows="5" id="comment"><?php echo $rs['review']?></textarea>
								   
								    </div>
								
                  <button class="btn btn-warning" name="update">Update Response</button>
						     </form> 
            <script>
                  $(function () {
                              console.log("yes");
                              $("#rateYo-up").rateYo({
                            
                               rating: <?php echo $rs['rate']?>,
                              onSet: function(rating,rateYoInstance){
                                $("#rating").val(rating);
                              }

                              });
                              });
            
               </script>
                    <?php  } ?> 
            </div>    
                           
        </div>                   
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
               <html>
              
        <div class="col-md-offset-2 col-md-8">
        
            <div id="testimonial-slider" class="owl-carousel"style="left:200px ; bottom:300px" >
            <?php 
              $noun = $_GET['var'];
               $test = "SELECT * FROM rating WHERE DID = '$noun'"; 
              $result = $conn->query($test);
              if($conn->affected_rows > 0){
                
              while($roll = $result->fetch_assoc()){
                  
         ?>
                <div class="testimonial">
                    <div class="pic">
                        <img src="https://static.pexels.com/photos/529928/pexels-photo-529928.jpeg">
                    </div>
                    <div class="testimonial-content">
                        <p><?php echo  $roll['review'] ?>
                        </p>
                    </div>
                    <h3 class="testimonial-title">
                        <a href="#"><?php echo $roll['UID'] ?></a>
                        <small>Customers</small>
                    </h3>
                </div>
                
              <?php }  } ?>
        </div>
        </div>


</body>
<?php include 'footer.php'?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        $('#testimonial-slider').owlCarousel({
            items:1,
            itemsDesktop:[1000,1],
            itemsDesktopSmall:[979,1],
            itemsTablet:[768,1],
            pagination: false,
            navigation:true,
            navigationText:["",""],
            slideSpeed:1000,
            autoPlay:true
        });
    });
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
</html>