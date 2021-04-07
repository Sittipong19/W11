<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-id-w10</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: cornflowerblue;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>เพิ่มสาขาวิชา</h4>    
                <?php
                    if(isset($_GET['submit'])){
                        $program_username = $_GET['pjc_username'];
                        $program_fname = $_GET['pjc_fname'];
                        $program_lname = $_GET['pjc_lname'];
                        $program_email = $_GET['pjc_email'];
                        $sql = "insert into project_custom (pjc_username, pjc_fname, pjc_lname, pjc_email) values ('$program_username','$program_fname','$program_lname','$program_email')";
                        include 'connectdb.php';
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เพิ่มคำนำหน้าชื่อ $program_username เรียบร้อยแล้ว<br>";
                        echo "เพิ่มคำนำหน้าชื่อ $program_fname เรียบร้อยแล้ว<br>";
                        echo "เพิ่มคำนำหน้าชื่อ $program_lname เรียบร้อยแล้ว<br>";
                        echo "เพิ่มคำนำหน้าชื่อ $program_email เรียบร้อยแล้ว<br>";
                        echo '<a href="project_custom_list.php">แสดงคำนำหน้าชื่อทั้งหมด</a>';
                    }else{
                ?>
                    
                    <form class="form-horizontal name="project_custom_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <div class="form-group">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="pjc_username" id="pjc_username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="pjc_fname" id="pjc_fname" placeholder="Firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="pjc_lname" id="pjc_lname" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                        <input type="email" class="form-control" name="pjc_email" id="pjc_email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" class="btn btn-default">เพิ่ม</button>
                        </div>
                    </div>
                    </form>

                <?php
                    }
                ?>
                </div>    
            </div>
            <div class="row">
                <address>คณะวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</address>
            </div>
        </div>    
    </body>
</html>