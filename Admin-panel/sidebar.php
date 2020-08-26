<?php    include 'config_admin.php';
       $query = "SELECT COUNT(SID) FROM salary_manage WHERE CURRENT_DATE > LAST_DAY(DATE)";
       $result =  $conn->query($query);
       $row = $result->fetch_assoc();
?>
<aside class="sidebar">
    <ul class="sidebar-list">
        <li class="sidebar-heading">CATEGORIES</li>
        <li class="sidebar-item"><a href="patient-table.php" class="sidebar-link">Patient details</a></li>
        <li class="sidebar-item"><a href="doctor-date.php"class="sidebar-link">Time-management</a></li>
        <li class="sidebar-item"><a href="test_manage.php" class="sidebar-link">Test management</a></li>
        <li class="sidebar-item"><a href="add_appoint_ment.php" class="sidebar-link">Add appointment</a></li>
        <li class="sidebar-item"><a href="add_doctor.php" class="sidebar-link">Add doctor</a></li>
        <li class="sidebar-item"><a href="add_staff.php" class="sidebar-link">Add stuff</a></li>
        <li class="sidebar-item"><a href="add_staff.php" class="sidebar-link">Patient Report</a></li>
        <li class="sidebar-item"><a href="salary.php" class="sidebar-link">Pending Salary     <strong><b style="color:red;font-size:15px"><?php echo $row['COUNT(SID)']  ?></b></strong></a></li>
        
    </ul>
</aside>