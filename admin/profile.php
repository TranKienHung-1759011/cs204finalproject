<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php
    include("../includes/header.php");
    include("../includes/connection.php");

    $ad=$_SESSION['admin'];
    $query = "SELECT * FROM admins WHERE adminusername='$ad'";

    $res=mysqli_query($connect,$query);
    while($row=mysqli_fetch_array($res)){
        $username =$row['adminusername'];
        $profiles=$row['profileimg'];

    }
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4> <?php echo $username;?> Profile</h4>
                                <?php
                                if(isset($_POST['update'])){
                                    $profile = $_FILES['profile']['name'];
                                    if(empty($profile)){

                                    }else{
                                        $query="UPDATE admins SET profileimg='$profile' WHERE adminusername='$ad'";
                                        $result= mysqli_query($connect,$query);
                                        if($result){
                                            move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
                                            header('Location: '.$_SERVER['REQUEST_URI']);
                                        }
                                    }
                                }
                                ?>
                                <form method="post" enctype="multipart/form-data">
                                <?php echo "<img src='img/$profiles' alt='admin imgage' class='col-md-12' style='height:200px;'>"?>
                                <br><br>
                                <div class="form-group">
                                    <label >Update Profile</label>
                                    <input type="file" name="profile" class="form-control">
                                </div>
                                <br>
                                <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php
                                if(isset($_POST['change'])){
                                    $uname = $_POST['uname'];
                                    if(empty($uname)){

                                    }else{
                                        $query="UPDATE admins SET adminusername = '$uname' WHERE adminusername='$ad'";
                                        $res = mysqli_query($connect,$query);
                                        if($res){
                                            $_SESSION['admin']= $uname;
                                            header('Location: '.$_SERVER['REQUEST_URI']);
                                        }
                                    }
                                }
                                ?>

                                <form method="post">
                                    <div class="form-group">
                                    <label> <h5>Change Username</h5></label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>
                                    <input type="submit" name="change" value="Change" class="btn btn-success">
                                </form>
                                <br>
                                <?php
                                if(isset($_POST['update_pass'])){
                                    $old_pass = $_POST['old_pass'];
                                    $new_pass =$_POST['new_pass'];
                                    $con_pass =$_POST['con_pass'];

                                    $error = array();

                                    $old=mysqli_query($connect,"SELECT * FROM admins WHERE adminusername='$ad'");
                                    $row=mysqli_fetch_array($old);
                                    $pass=$row['adminpassword'];

                                    if(empty($old_pass)){
                                        $error['p']= "Enter old password";
                                    }else if(empty($new_pass)){
                                        $error['p'] = "Enter new password";
                                    }else if(empty($con_pass)){
                                        $error['p'] = "Enter confirm password";
                                    }else if($old_pass != $pass){
                                        $error['p'] = "Invalid old password";
                                    }else if($new_pass != $con_pass){
                                        $error['p'] = "Passwords not match";
                                    }


                                    if(count($error)==0){
                                        $query ="UPDATE admins SET adminpassword = '$new_pass' WHERE adminusername = '$ad'";
                                        mysqli_query($connect,$query);
                                    }


                                }
                                if(isset($error['p'])){
                                    $e =$error['p'];
                                    $show ="<h5 class='text-center alert alert-danger'>$e</h5>";
                                }else{
                                    $show="";
                                }
                                ?>
                                <form method="POST">
                                    <h5 class="my-4"> Change Password</h5>
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control">
                                    </div>

                                    <input type="submit" name="update_pass" value="Update Password" class="btn btn-success">
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>