
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Patient login</title>
</head>
<body>
    <?php 
    include("includes/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron my-3">
                    <h5 class="text-center my-3">Patient login</h5>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" class="btn btn-info" name="login" value="Login">
                        <p>Dont have an account? <a href="account.php">Click here!</a></p>
                    </form>
                    <?php
                        session_start();
                        include("includes/connection.php");

                        if(isset($_POST['login'])){
                            $uname=$_POST['uname'];
                            $pass=$_POST['pass'];
                            $error = array();
                            if(empty($uname)){
                                $error['login']="Enter Username";

                            }else if(empty($pass)){
                                $error['login'] = "Enter Password";
                            }

                            if(count($error)==0){
                                $query ="SELECT * FROM patient WHERE patientusername='$uname' AND patientpassword ='$pass'";
                                $res =mysqli_query($connect,$query);

                                if(mysqli_num_rows($res)){
                                    $_SESSION['patient']=$uname;
                                    header("Location:patient/index.php");
                                }else{
                                    echo "<script>alert('failed')</script>";
                                }
                            }

                        }
                    ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>