
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" type="image/png"  href="medica.png">
    <title>Admin Panel</title>
    
    <link rel="stylesheet" href="admin.css">
</head>
<div class="modal fade" id="sign-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Want to leave?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Press logout to leave
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success p-3" data-dismiss="modal">Stay Here</button>
                    <button type="button" class="btn btn-danger p-3" data-dismiss="modal" onclick="Myfunction()">Logout</button>
                </div>
            </div>
        </div>
    </div>
<nav class="navigation" id="navbar">
    <div class="navigation-icon">
        <img class="navigation-logo" src="medica.png" alt="Logo">
        <a class="navigation-brand-link">Medica Superspeciality Hospital</a>
    </div>
    <ul class="navigation-list">
        <li class="navigation-item"><a href="admin_panel.php" class="navigation-link">Dashboard</a></li>
        <li class="navigation-item"><a href="#" class="navigation-link">Management</a></li>
        <li class="navigation-item"><a href="profile.php" class="navigation-link"><?php echo $_SESSION['uname'];?></a></li>
        <li class="navigation-item"> <a href="logout.php" class="navigation-link"data-toggle="modal" data-target="#sign-out">Log out</a></li>
    </ul>
</nav>

<!-- modal -->


<!-- modal -->
    
    <!-- end of modal -->
    <!-- end of modal -->
<!-- <button class="navigation-link" name="logout">Log Out</button> -->

<script>

function Myfunction(){
        window.location.href="logout.php";
    }
</script>