

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/login.css">
    <title>Admin login page</title>
</head>
<body>
    <?php
    include("includes/header.php");
    ?>
    <div class="container" style="margin-top: 5%;">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">

                </div>

                <div class="col-md-6 jumbotron">
                    <form action="adminlogin.php" method="post" class="my-2">

                    <div >
                        <?php
                        if(isset($error['admin'])){
                            $sh=$error['admin'];
                            $show="<p class='alert alert-danger'>$sh</p>";
                        }else{
                            $show="";
                        }
                        echo $show;
                        ?>
                    </div>
                        <div class="form-group">
                        <i class="fas fa-user"></i> <label> Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Username">
                        </div>
                        <div class="form-group">
                        <i class="fas fa-lock"><label></i> Password</label>
                            <input type="password" name="upass" id="adminPass" class="form-control" placeholder="Password">
                        </div>
                        <input type="checkbox" onclick="showPassword()">Show Password
                        <input type="submit" name="Login" class="btn btn-success" value="Login">
                    </form>
                    <?php
                        session_start();
                        include("includes/connection.php");
                        if (isset($_POST['Login'])){
                            $username =$_POST['uname'];
                            $password = $_POST['upass'];
                            $error = array();
                            if(empty($username)){
                                $error['admin']="Enter Username";

                            }else if(empty($password)){
                                $error['admin'] = "Enter Password";
                            }

                            if(count($error)==0){
                                $query = "SELECT * FROM admins WHERE adminusername = '$username' AND adminpassword ='$password'";
                                $result = mysqli_query($connect,$query);

                                if(mysqli_num_rows($result)==1){
                                    echo "<script>alert('You have logged in as an Admin.')</script>";
                                    $_SESSION['admin']=$username;
                                    header("Location:admin/index.php");
                                    exit();
                                }
                                else{
                                    echo "<script>alert('Invalid Username or Password!')</script>";
                                }
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showPassword() {
            var x = document.getElementById("adminPass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>