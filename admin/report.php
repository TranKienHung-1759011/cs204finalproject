<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <?php
    include("../includes/header.php");
    include("../includes/connection.php")
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
                    <h5 class="text-center my-2">Total Report</h5>
                    <?php
                        $query="SELECT * FROM report ";
                        $res = mysqli_query($connect,$query);

                        $output = "";
                    $output .= "
                             <table class='table table-bordered'>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Username</th>
                                    <th>Date sent</th>

                                </tr>
                    ";
                    
                    
                    
                    if(mysqli_num_rows($res)<1){
                        $output .="
                                <tr>
                                    <td colspan='5' class='text-center'>NO report Yet.</td>
                                </tr>
                        ";
                    }
                    
                    while($row=mysqli_fetch_array($res)){
                        $output.="
                                <tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['title']."</td>  
                                    <td>".$row['messages']."</td>  
                                    <td>".$row['username']."</td>
                                    <td>".$row['date_send']."</td>

                        ";
                    }
                    
                    $output.="
                                </tr>
                            </table>
                    ";
                    
                    echo $output;

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>m