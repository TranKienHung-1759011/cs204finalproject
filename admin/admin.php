<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <?php
    include("../includes//header.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                        include("../includes/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">All admins</h5>
                                <?php
                                    $ad = $_SESSION['admin'];
                                    $query= "SELECT * FROM admins WHERE adminusername !='$ad' ";
                                    $res = mysqli_query($connect,$query);
                                    
                                    $output="
                                    <table class='table table-bordered'>
                                    <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th style='width: 10%;'>Action</th>
                                    <tr>
                                    ";    
                                    
                                    if(mysqli_num_rows($res)<1){
                                        $output.="<tr><td colspan ='3' class='text-center'>No New Admin</td></tr>";
                                    }   
                                    
                                    while($row = mysqli_fetch_array($res)){
                                        $id= $row['id'];
                                        $username= $row['adminusername'];

                                        $output.="
                                        <tr>
                                        <td>$id</td>
                                        <td>$username</td>
                                        <td>
                                            <a href='admin?id=$id'><button id='$id' class='btn btn-danger'>Remove</button></a>
                                        </td>
                                        ";
                                    }
                                    $output .= "
                                    </tr>
                                    </table>
                                    ";
                                    echo $output;

                                    if(isset($_GET['id'])){
                                        $id=$_GET['id'];
                                        $query= "DELETE FROM admins WHERE id='$id'";
                                        mysqli_query($connect,$query);

                                    }

                                ?> 
                                

                            </div>

                            <div class="col-md-6">
                                <?php
                                if(isset($_POST['add'])){
                                    $uname=$_POST['uname'];
                                    $upass=$_POST['upass'];
                                    $image=$_FILES['img']['name'];

                                    $error = array();

                                    if(empty($uname)){
                                        $error['u']= "Enter admin username!";
                                    
                                    }else if(empty($upass)){
                                        $error['u']= "Enter admin password";
                                    }else if(empty($image)){
                                        $error['u']= "Add Admin picture";
                                    }

                                    if(count($error)==0){
                                        $query2="INSERT INTO admins(adminusername,adminpassword,profileimg) VALUES('$uname','$upass','$image')";
                                        $result= mysqli_query($connect,$query2);
                                        if($result){
                                            move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                                            header('Location: '.$_SERVER['REQUEST_URI']);

                                        }else{

                                        }
                                    }
                                }


                                if(isset($error['u'])){
                                    $er=$error['u'];
                                    $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                                }else{
                                    $show="";
                                }
                                ?>
                                <h5 class="text-center">Add admin</h5>
                                <form action="admin.php" method="post" enctype="multipart/form-data">
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="upass" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Add imgage</label>
                                        <input type="file" name="img" class="form-control">
                                    </div><br>
                                    <input type="submit" name="add" value="Add new Admin" class="btn btn-primary">
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