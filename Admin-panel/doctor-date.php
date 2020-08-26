            <?php
            
            include 'action_admin.php';            
            $query = "SELECT distinct DEPT FROM doctor_dept ORDER BY DEPT"; 
            $result = $conn->query($query);          
            ?>
    <head>
    
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet"  href="admin.css">
               <!-- Latest compiled and minified CSS -->
                    <style>
                        section {
                                padding: 11rem;
                                background: whitesmoke;
                            }
                        .table-wrapper {
                            height: 400px;
                            /* background-color: orange; */
                            overflow: auto;
                            margin: 10px;
                            width: auto;
                            top:60px;
                            width:800px;
                        }
                    </style>
      </head>
     <body>
   <?php  include 'header.php';  ?>
<section>
    <div class="container-fluid">
               <div class="row justify-content-center" style="text-align:center">
                     <?php if(isset($_SESSION['response'])){?>

                            <div class="alert alert-<?= $_SESSION['res_type'] ; ?> alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $_SESSION['response'] ;?> 
                            </div>

                     <?php      }  unset($_SESSION['response']) ?>
               </div>
        <div class="row" style="right:70px">
                          <div calss="col-md-4">
                                    <h3 class="text-center text-info p-2" style="font-size:20px">Add Doctor Timings</h3>
                                    <form method="POST" action="action_admin.php" enctype="multipart/form-data">
                                       <div >
                                                        <select id="dept" name="dept" class="form-control">
                                                            <option value="">Select Department</option>
                                                            <?php 
                                                                if($result->num_rows > 0){ 
                                                                while($row = $result->fetch_assoc()){  
                                                                    echo '<option value="'.$row['DEPT'].'">'.$row['DEPT'].'</option>';  
                                                                } 
                                                            }else{ 
                                                                echo '<option value="">Department not available</option>'; 
                                                            } 
                                                            ?>
                                                        </select>
                                        </div>
                                    <hr>
                                       <div>
                                            <select name="doctor_name" class="form-control" id="doctor">
                                                     <option>Doctors</option>
                                                    
                                             </select>
                                       </div>
                                       <hr>
                                       <div>
                                            <select name="Doctor_id" class="form-control" id="doctor_id">
                                                     <option>ID</option>
                                             </select>
                                       </div>
                                <hr>
                                       
                                       <div class="checkbox custom-checkbox p-3">

                                            <label class="checkbox-inline">
                                                 <input type="checkbox" value="Sun" name="day[]">Sun
                                            </label>
                                            <label class="checkbox-inline">
                                                 <input type="checkbox" value="Mon" name="day[]">Mon
                                            </label>                   

                                            <label class="checkbox-inline">
                                                 <input type="checkbox" value="Tue" name="day[]">Tue
                                            <label class="checkbox-inline">
                                            <label class="checkbox-inline">
                                                 <input type="checkbox" value="Wed" name="day[]">wed
                                            <label class="checkbox-inline">
                                            <label class="checkbox-inline">
                                                 <input type="checkbox" value="Thu" name="day[]">Thu
                                            <label class="checkbox-inline">
                                            <label class="checkbox-inline">
                                                 <input type="checkbox" value="Fri" name="day[]">Fri
                                            <label class="checkbox-inline">
                                            <label>
                                                 <input type="checkbox" value="Sat" name="day[]">Sat
                                            </label>
                               </div> 
                                        
                               <div class="form-group">
                                        <input name="time" class="form-control p-3" type="text" placeholder="Enter the time" required>
                                        
                                </div>
                                <div class="form-group">
                                        <input name="visiting" class="form-control p-3" type="text" placeholder="Enter the visit of the doctor" required>
                                        
                                </div>
                                <div class="form-group btn">
                                            <input type="submit" name="add-time" class="btn btn-info"value="submit" required>
                                        </div>                    
                                 </form>
                            </div>
                 <div class="col-md-8 p-2 justify-content-center" style="bottom:100px;top:20px;display:flex;flex-direction: column;">
                     <?php 
                         $show = "SELECT dept,doctor,days,time,visiting FROM doctor_time";
                          $result = $conn->query($show);

                    ?>
                            <div class="table-wrapper" style="bottom:50px">
                                    <table class="table hover-table text-center" >
                                                <thead>
                                                <tr>
                                                    <th>DEPARTMENT</th>
                                                    <th>Name</th>
                                                    <th>DAYS</th>   
                                                    <th>Timings</th>
                                                    <th>Visiting</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    
                                                    while($row = $result->fetch_assoc()){
                                                   
                                                   ?>
                                                   <tr>
                                                   <td><?=$row['dept']?></td>
                                                   <td><?=$row['doctor']?></td>
                                                   <td><?=$row['days']?></td>
                                                   <td><?=$row['time']?></td>
                                                   <td><?=$row['visiting']?></td>
                                                   <td>
                                                    <a href="action_admin.php?delete-time=<?=$row['doctor'];?>&dept=<?php echo $row['dept'];?>" onclick="return confirm('Do You want to delete this record?');" class="badge badge-danger p-2">Delete</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                                
                                                    
                                           </table>
                                           
                                 </div>
                                           <div class="row justify-content-center">
                                                <a href="../fpdf182/output.php" class="btn btn-warning p-2">download pdf</a>
                                           </div>
                                          
                            
                    </div>
           </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
                    $(document).ready(function(){
                        $('#dept').on('change', function(){
                            var deptname = $(this).val();
                            if(deptname){
                                $.ajax({
                                    type:'POST',
                                    url:'action_admin.php',
                                    data:'deptname='+deptname,
                                    success:function(html){
                                        console.log(html);
                                        $('#doctor').html(html);
                                    }
                                }); 
                            }else{
                                $('#state').html('<option value="">Select department first</option>');
 
                            }
                        });
                    })
                    $(document).ready(function(){
                        $('#doctor').on('change', function(){
                            var doctor = $(this).val();
                            if(doctor){
                                $.ajax({
                                    type:'POST',
                                    url:'action_admin.php',
                                    data:'doctor='+doctor,
                                    success:function(html){
                                        console.log(html);
                                        $('#doctor_id').html(html);
                                    }
                                }); 
                            }else{
                                $('#state').html('<option value="">Select Doctor first</option>');
 
                            }
                        });
                    })
        </script>
                       
        </section>
   <?php include 'footer.php' ?>
    </body>
</html>