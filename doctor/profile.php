<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
</head>
<body>
    <?php 
    include("../includes/header.php");
    include("../includes/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                <?php 
                include("sidenav.php");
                ?>
                </div>
                <div class="col-md-10"">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php 
                                    $doc=$_SESSION['doctor'];
                                    $query="SELECT * FROM doctors WHERE doctorusername='$doc' ";
                                    $res=mysqli_query($connect,$query);
                                    $row = mysqli_fetch_array($res);
                                    
                                    if(isset($_POST['upload'])){
                                        $img=$_FILES['img']['name'];
                                        if(empty($img)){

                                        }else{
                                            $query="UPDATE doctors SET profileimg='$img' WHERE doctorusername='$doc'";
                                            $res=mysqli_query($connect,$query);
                                            if($res){
                                                move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                                header('Location: '.$_SERVER['REQUEST_URI']);
                                            }
                                        }
                                    }
                                    ?>
                                    
                                    <form action="" method="POST" enctype="multipart/form-data">
                                    <?php 
                                    echo "<img src='img/".$row['profileimg']."' style='height: 150px;' class='col-md-12 my-3'>";
                                    ?>
                                    <input type="file" name="img" class="form-control">
                                    <input type="submit" name="upload" class="btn btn-success my-3" value="Update Profile">
                                    </form>
                                    <div class="my-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="2" class="text-center">Details</th>
                                            </tr>
                                            <tr>
                                                <td>Firstname</td>
                                                <td><?php echo $row['firstname']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Surname</td>
                                                <td><?php echo $row['surname']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $row['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><?php echo $row['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php echo $row['gender']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td><?php echo $row['country']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Salary</td>
                                                <td>$<?php echo $row['salary']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center my-2">Update Username</h5>
                                    <?php 
                                    if (isset($_POST['change_uname'])){
                                        $uname=$_POST['uname'];
                                        if(empty($uname)){

                                        }else{
                                            $query = "UPDATE doctors SET doctorusername = '$uname' WHERE doctorusername = '$doc'";
                                            $res=mysqli_query($connect,$query);
                                            if($res){
                                                $_SESSION['doctor']=$uname;
                                            }
                                        }
                                    }
                                    ?>
                                    <form action="" method="POST">
                                        <label for="">Change Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Username">
                                        <br>
                                        <input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
                                    </form>
                                    <br> <br>
                                    <h5 class="text-center my-2">Change Password</h5>
                                    <?php
                                    if(isset($_POST['change_pass'])){
                                        $old=$_POST['old_pass'];
                                        $new=$_POST['new_pass'];
                                        $con=$_POST['con_pass'];

                                        $query= "SELECT * FROM doctors WHERE doctorusername ='$doc'";
                                        $res = mysqli_query($connect,$query);
                                        $row= mysqli_fetch_array($res);

                                        if($old!=$row['doctorpassword']){

                                        }else if(empty($new)){

                                        }else if(empty($con)){

                                        }else if($con != $new){
                                            
                                        }else{
                                            $query ="UPDATE doctors SET doctorpassword = '$new' WHERE doctorusername = '$doc'";
                                            mysqli_query($connect,$query);
                                        }
                                    }
                                    ?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="">Old Password</label>
                                            <input type="text" name="old_pass" class="form-control" autocomplete="off" placeholder="Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="text" name="new_pass" class="form-control" autocomplete="off" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm New Password</label>
                                            <input type="text" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
                                        </div>
                                        <input type="submit" name="change_pass" class="btn btn-success" value="Change Password">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>