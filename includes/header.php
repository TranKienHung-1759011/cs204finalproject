<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white">Hospital manager</h5>
        <div class="mr-auto"></div>
        <ul class="navbar-nav">
            <?php
            if(isset($_SESSION['admin'])){
                $user=$_SESSION['admin'];
                echo '
                <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
                ';
            }else if(isset($_SESSION['doctor'])){
                $user=$_SESSION['doctor'];
                echo '
                <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
                ';
            }else if(isset($_SESSION['patient'])){
                $user=$_SESSION['patient'];
                echo '
                <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
                ';
            }else{
                echo'
                <li class="nav-item"><a href="./index.php" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="./adminlogin.php" class="nav-link text-white">Admin</a></li>
                <li class="nav-item"><a href="./doctorlogin.php" class="nav-link text-white">Doctor</a></li>
                <li class="nav-item"><a href="./patientlogin.php" class="nav-link text-white">Patient</a></li>';
            }
            ?>
        </ul>
    </nav>
</body>
</html>