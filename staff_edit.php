<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1">
        <title>Project 6015261007</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include indivIDual files as needed -->
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
                    <h4>แก้ไขข้อมูลsteff</h4>
                    <?php
                        $sf_id = $_REQUEST['sf_id'];
                        if(isset($_GET['submit'])){
                            $sf_id = $_GET['sf_id'];
                            $sf_ttl_id = $_GET['sf_ttl_id'];
                            $sf_fname = $_GET['sf_fname'];
                            $sf_lname = $_GET['sf_lname'];
                            $sf_nname = $_GET['sf_nname'];
                            $sf_tel = $_GET['sf_tel'];
                            $sf_ad = $_GET['sf_ad'];
                            $sf_job_id = $_GET['sf_job_id'];
                            $sf_jobs_ids = $_GET['sf_job_ids'];
                            $sql = "update staff set ";
                            $sql .= "sf_fname='$sf_fname',sf_lname='$sf_lname',sf_ttl_id='$sf_ttl_id',sf_nname='$sf_nname',sf_tel='$sf_tel',sf_ad='$sf_ad',sf_job_id='$sf_job_id',sf_job_ids='$sf_jujobs_ids' ";
                            $sql .="where sf_id='$sf_id' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลแอดมิน $sf_ttl_id $sf_fname $sf_lname $sf_nname $sf_tel $sf_ad $sf_job_id $sf_jobs_ids เรียบร้อยแล้ว<br>";
                            echo '<a href="staff_list.php">แสดงรายชื่อแอดมินทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="staff_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <input type="hIDden" name="sf_id" ID="sf_id" value="<?php echo "$sf_id";?>">
                            <label for="sf_ttl_id" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="sf_ttl_id" ID="sf_ttl_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from staff where sf_id='$sf_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fsf_fname = $row2['sf_fname'];
                                    $fsf_lname = $row2['sf_lname'];
                                    $fsf_nname = $row2['sf_nname'];
                                    $fsf_tel = $row2['sf_tel'];
                                    $fsf_ad = $row2['sf_ad'];
                                    $sf_job_id = $row2['sf_job_id'];
                                    $sf_jobs_ids = $row2['sf_job_ids'];
                                    $fsf_ttl_id = $row2['sf_ttl_id'];
                                    $sql =  "SELECT * FROM title order by ttl_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_id'].'"';
                                        if($row['ttl_id']==$fsf_ttl_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['ttl_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="sf_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="sf_fname" ID="sf_fname" class="form-control" 
                                       value="<?php echo $fsf_fname;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="sf_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="sf_lname" ID="sf_lname" class="form-control" 
                                       value="<?php echo $fsf_lname;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="sf_nname" class="col-md-2 col-lg-2 control-label">ชื่อเล่น</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="sf_nname" ID="sf_nname" class="form-control" 
                                       value="<?php echo $fsf_nname;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="sf_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="varchar" name="sf_tel" ID="sf_tel" class="form-control" 
                                       value="<?php echo $fsf_tel;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="sf_ad" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="sf_ad" ID="sf_ad" class="form-control" 
                                       value="<?php echo $fsf_ad;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <input type="hIDden" name="sf_id" ID="sf_id" value="<?php echo "$sf_id";?>">
                            <label for="sf_job_id" class="col-md-2 col-lg-2 control-label">ตำแหน่งงาน</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="sf_job_id" ID="sf_job_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from staff where sf_id='$sf_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fsf_fname = $row2['sf_fname'];
                                    $fsf_lname = $row2['sf_lname'];
                                    $fsf_nname = $row2['sf_nname'];
                                    $fsf_tel = $row2['sf_tel'];
                                    $fsf_ad = $row2['sf_ad'];
                                    $sf_job_id = $row2['sf_job_id'];
                                    $sf_jobs_ids = $row2['sf_job_ids'];
                                    $fsf_ttl_id = $row2['sf_ttl_id'];
                                    $sql =  "SELECT * FROM job order by job_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['job_id'].'"';
                                        if($row['job_id']==$fsf_job_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['job_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
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
                <address>คณะคอมพิวเตอร์ศึกษาปี 2 </address>
            </div>
        </div>    
    </body>
</html>