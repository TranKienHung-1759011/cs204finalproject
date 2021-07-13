<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Doctorlogin</title>
</head>
<body>
    <?php
    include("includes/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 jumbotron my-3">
                    <h5 class="text-center my-2">Doctors login</h5>
                    <div>
                    <?php
                    echo $show;
                    ?>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="username">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="password" autocomplete="off">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" value="Login">
                        <p>Don't have an account? <a href="apply.php">Apply now!</a></p>
                    </form>
                    <?php
                        session_start();
                        include("includes/connection.php");
                        if (isset($_POST['login'])){
                            $username =$_POST['uname'];
                            $password = $_POST['pass'];
                            $error = array();

                            $query = "SELECT * FROM doctors WHERE doctorusername = '$username' AND doctorpassword ='$password'";
                            $result = mysqli_query($connect,$query);
                            $row = mysqli_fetch_array($result);

                            if(empty($username)){
                                $error['login']="Enter Username";

                            }else if(empty($password)){
                                $error['login'] = "Enter Password";
                            }else if($row['doctorstatus']=="Pending"){
                                $error['login']="Please wait for the admin";
                            }else if($row['doctorstatus']=="Rejected"){
                                $error['login']="Try again later";
                            }


                            if(count($error)==0){
                                $query ="SELECT * FROM doctors WHERE doctorusername='$username' AND doctorpassword ='$password'";
                                $res =mysqli_query($connect,$query);

                                if(mysqli_num_rows($res)){
                                    echo "<script>alert('done')</script>";
                                    $_SESSION['doctor']=$username;
                                    header("Location:doctor/index.php");
                                    exit();
                                }else{
                                    echo "<script>alert('failed')</script>";
                                }
                            }
                        }

                        if(isset($error['login'])){
                            $sh=$error['login'];
                            $show="<p class='text-center alert alert-danger'>$sh</p>";
                        }else{
                            $show="";
                        }
                    ?>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>
</body>
</html>