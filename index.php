
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include("includes/header.php");
?>
    <div class="container" style="margin-top: 5%;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mx-1 shadow">
                    <img src="img/info.png" alt="info img" style="width: 100%;max-height:150px;">
                    <h5 class="text-center">For more information</h5>
                    <a href="#">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">Click here!</button>
                    </a>
                </div>

                <div class="col-md-4 mx-1 shadow">
                    <img src="img/patient.jpg" alt="patient img" style="width:100%;max-height:150px; ">
                    <h5 class="text-center">Make appointment for patients here!</h5>
                    <a href="account.php">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">Create account</button>
                    </a>
                </div>

                <div class="col-md-4 mx-1 shadow">
                    <img src="img/doctor.jpg" alt="doctor img" style="width:100%;max-height:150px;">
                    <h5 class="text-center">Hiring for doctors here!</h5>
                    <a href="apply.php">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">Apply now!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>