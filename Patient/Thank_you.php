<head>
               <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
               <!-- <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'> -->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
                <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
                   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">

                <style>
                    .thnk{
                        justify-content: center;
                        margin-left: 5%;
                        text-align: center;
                        font-family: 'Nunito', sans-serif;
                        margin-top: 5%;
                          }
                
                </style>

</head>
<body>
   
   <div class="container thnk">
      <div class="row">
        <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
            <h2 class="text-center">YOUR Appointment has been confirmed</h2>
                <h3 class="text-center">Thank you for your payment, you will be notified</h3>
                            <?php  
                            session_start();
                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\Exception;
                            use PHPMailer\PHPMailer\SMTP;
                            $f=0;
                            include "../Admin-panel/config_admin.php";
                            if(isset($_GET['var'])){
                                $var = $_GET['var'];
                            $insert = "SELECT * FROM cart where UID = '$var'";
                            $result = $conn->query($insert);
                            if($conn->affected_rows > 0){
                            $res = $result->fetch_assoc();
                            $uid = $var;
                            $did = $res['DID'];
                            $date = $res['BOOKING'];
                            $time = $res['prefered_time'];
                            $new = "SELECT NAME FROM patient_data WHERE email = '$var'";
                            $doctor = "SELECT NAME FROM doctor WHERE DID = '$did'";
                            $r = $conn->query($doctor);
                            $doctor_name = $r->fetch_assoc();
                            $n_doctor = $doctor_name['NAME'];
                            $nm = $conn->query($new);
                            $name = $nm->fetch_assoc();
                            $name_r = $name['NAME'];
                            $fees = "SELECT visiting from doctor_time WHERE DID = '$did'";
                            $run = $conn->query($fees);
                            $call = $run->fetch_assoc();
                            $fee = $call['visiting'];
                            $sql = "INSERT INTO appointment_confirm(UID,DID,doctor,NAME,DATE,TIME,PAYMENT,FEE) VALUES('$uid','$did','$n_doctor','$name_r','$date','$time','Payment should be given at clinic','$fee')";
                            $conn->query($sql);
                            if($conn->affected_rows)
                               {
                               echo '<h2>Your Apoointment is confirmed and Visiting fees is :'.$fee.' </h2>';
                               $f = 1;
                               }
                            }
                                                 }
                            ?>
                            <center>
                              <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                <th scope="col">Sl no.</th>
                                                <th scope="col">Name</th>
                                        
                                                <th scope="col">Doctor Name</th>
                                                <th scope="col">Booked Date</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Payment</th>
                                                <th scope="col">Visiting Fees</th>
                                                </tr>
                                            </thead>
                                
                                            <tbody>
                                            <?php 
                                            
                                              $fetch = "SELECT * FROM appointment_confirm WHERE UID = '$var'";
                                              $resultset = $conn->query($fetch);
                                              while($row = $resultset->fetch_assoc()){
                                            ?>
                                            
                                                <tr>
                                                <td><?php echo $row['ID'] ?></td>
                                                <td><?php  echo $row['NAME'] ?></td> 
                                                <td><?php  echo $row['doctor'] ?></td>
                                                <td><?php echo $row['DATE'] ?></td>
                                                <td><?php echo $row['TIME'] ?></td>
                                                <td><?php echo $row['PAYMENT'] ?></td>
                                                <td><?php echo $row['FEE'] ?></td>
                                                </tr>
                                                <?php  } ?>
                                            </tbody>

                                            </table>
                            <div class="btn-group"> 
             <a href="doc1_se.php" class="btn btn-lg btn-success p-2" style="text-align:center">go to home</a>
            </div></center>
        </div>
    </div>
</div>
                        
</body>
                     <?php 
                    //  sending email confirmation

                    if($f == 1)
                       {
                            
                            $email = $var;
                            $body = '<html><head></head><h1>Thank You for booking your date  '.$name_r.'</h1> <br> <h4>Your respective booking time is  ==>'.$time.'</h4><br><h4>You should present respective to the time And doctor visiting fees is: '.$fee.'</h4>';
                            require "phpmailer\Exception.php";  
                            require "phpmailer\PHPMailer.php";
                            require "phpmailer\SMTP.php";

                            $mail = new PHPMailer();
                            $mail->isSMTP();
                            $mail->Host = "smtp.gmail.com";
                            $mail->SMTPAuth = "true";
                            $mail->SMTPSecure = "tls";
                            $mail->port = "587";
                            $mail->Username = "soumyo123chak@gmail.com";
                            $mail->Password = "Chak123@";
                            $mail->isHTML(true);
                            $mail->Subject ="Confirmation Email of Appointment at Medica hospital";
                            $mail->Body =       $body;
                           
                            $mail->setFrom("soumyo123chak@gmail.com","Medica");
                            $mail->addAddress($email);
                            
                            if($mail->Send()){
                                echo "Successful sending";
                            }
                            else{
                                echo "Something went wrong"; 
                            }
                            $mail->smtpClose();
                          //Deleting the cart after order is confirmed
                           // mail sending done
                       $sql = "DELETE FROM cart where UID = '$var'";
                    
                       $conn->query($sql);
                      if(!$conn)
                         echo "go wrong";
                           
                       }
                      
                           
                
                       ?>