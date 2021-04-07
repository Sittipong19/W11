<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-id-w10-title-edit</title>
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
                <h4>แก้ไขข้อมูลสาขาวิชา</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_POST['submit'])){
                        $pjc_id     = $_POST['pjc_id'];
                        $pjc_username   = $_POST['pjc_username'];
                        $pjc_fname   = $_POST['pjc_fname'];
                        $pjc_lname   = $_POST['pjc_lname'];
                        $pjc_email   = $_POST['pjc_email'];
                        $sql = "update project_custom set pjc_username='$pjc_username', pjc_fname='$pjc_fname', pjc_lname='$pjc_lname', pjc_email='$pjc_email'  where pjc_id='$pjc_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เพิ่มเรียบร้อยแล้ว<br>";
                        echo '<a href="project_custom_list.php">แสดสาขาวิชาทั้งหมด</a>';
                    }else{
                        $fpjc_id = $_REQUEST['pjc_id'];
                        $sql =  "SELECT * FROM project_custom where pjc_id='$fpjc_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fpjc_username = $row['pjc_username'];
                        $fpjc_fname   = $row['pjc_fname'];
                        $fpjc_lname   = $row['pjc_lname'];
                        $fpjc_email   = $row['pjc_email'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" method="post" role="form" name="project_custom_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="pjc_id" id="pjc_id" value="<?php echo "$fpjc_id";?>">
                        <div class="form-group">
                            <label for="pjc_username" class="col-md-2 col-lg-2 control-label">Username</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pjc_username" id="pjc_username" class="form-control" value="<?php echo "$fpjc_username";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="pjc_fname" class="col-md-2 col-lg-2 control-label">Firstname</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pjc_fname" id="pjc_fname" class="form-control" value="<?php echo "$fpjc_fname";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="pjc_fname" class="col-md-2 col-lg-2 control-label">Lastname</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pjc_lname" id="pjc_lname" class="form-control" value="<?php echo "$fpjc_lname";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="pjc_fname" class="col-md-2 col-lg-2 control-label">Email</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="email" name="pjc_email" id="pjc_email" class="form-control" value="<?php echo "$fpjc_email";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
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