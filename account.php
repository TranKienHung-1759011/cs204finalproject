<?php
session_start();
include("includes/connection.php");
if (isset($_POST['create'])){

    $firstname=$_POST['fname'];
    $surname=$_POST['sname'];
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $confirm_password=$_POST['con_pass'];

    $error = array();
    if(empty($firstname)){
        $error['ac']="Enter firstname";
    }else if(empty($surname)){
        $error['ac']="Enter Surname";
    }else if(empty($username)){
        $error['ac']="Enter Username";
    }else if(empty($password)){
        $error['ac']="Enter Password";
    }else if(empty($email)){
        $error['ac']="Enter Email";
    }else if(empty($gender)){
        $error['ac']="Enter gender";
    }else if(empty($phone)){
        $error['ac']="Enter Phone";
    }else if(empty($country)){
        $error['ac']="Enter country";
    }else if(empty($confirm_password)){
        $error['ac']="Enter confirm Password";
    }else if($confirm_password!=$password){
        $error['ac']="Password not match!";
    }

    if(count($error)==0){
        $query ="INSERT INTO patient(firstname,surname,patientusername,email,phone,gender,country,patientpassword,date_reg, profileimg) 
        VALUES('$firstname','$surname','$username','$email','$phone','$gender','$country','$password',NOW(),'patient.jpg')";
        $result = mysqli_query($connect,$query);
        if($result){
            header("Location: patientlogin.php");
        }else{
            echo "<script>alert('Failed')</script>";
        }
    }

}

if(isset($error['ac'])){
    $s = $error['ac'];
    $show ="<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
    $show ="";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>create</title>
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
                    <h5 class="text-center">create now!</h5>
                    <?php
                        echo $show;
                        ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" 
                            value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname"
                            value="<?php if(isset($_POST['sname'])) echo $_POST['sname'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="">username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username"
                            value="<?php if(isset($_POST['uname'])) echo $_POST['uname'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password"name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password"name="con_pass" class="form-control" autocomplete="off" placeholder="Re-Enter Password">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email"
                            value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter phone number"
                            value="<?php if(isset($_POST['phone'])) echo $_POST['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" name="country" class="form-control" autocomplete="off" placeholder="Enter your contry">
                        </div>
                        <input type="submit" name="create" class="btn btn-success" value="create Now">
                        <p>Already have an account? <a href="patientlogin.php">Login Now!</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>