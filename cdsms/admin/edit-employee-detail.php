<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cdsmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['editid'];
$cmsaid=$_SESSION['cdsmsaid'];
 $emp_fname=$_POST['emp_fname'];
$emp_lname=$_POST['emp_lname'];
$emp_addr=$_POST['emp_addr'];
$emp_contact=$_POST['emp_contact'];
$customers_trained=$_POST['customers_trained'];
$rating=$_POST['rating'];
 $query=mysqli_query($con,"update employee set emp_fname='$emp_fname',emp_lname='$emp_lname',emp_addr='$emp_addr',emp_contact='$emp_contact',customers_trained='$customers_trained',rating='$rating' where  emp_id='$eid'");

    if ($query) {
   
    echo "<script>alert('Employee Detail has been update.');</script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CDSMS Packages</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Employee Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-employee.php">View Employees</a></li>
                            <li class="active">Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Employee</strong><small> Details</small></div>
                            <form name="package" method="post" action="">
                                
                            <div class="card-body card-block">
 <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  employee where emp_id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-group"><label for="company" class=" form-control-label">Employee Firstname</label><input type="text" name="emp_fname" value="<?php  echo $row['emp_fname'];?>" class="form-control" id="emp_fname" required="true"></div>
                                    <div class="form-group"><label for="company" class=" form-control-label">Employee Lastname</label><input type="text" name="emp_lname" value="<?php  echo $row['emp_lname'];?>" class="form-control" id="emp_fname" required="true"> </div>
                                        <div class="form-group"><label for="vat" class=" form-control-label">Employee Address</label><textarea type="text" name="emp_addr" id="emp_addr" class="form-control" required="true"><?php  echo $row['emp_addr'];?></textarea></div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Employee Contact</label><input type="text" name="emp_contact" id="emp_contact" value="<?php  echo $row['emp_contact'];?>" class="form-control" required="true"></div>
                                                    </div>
                                                    <div class="form-group"><label for="city" class=" form-control-label">Number of Customers trained</label><input type="text" name="customers_trained" id="customers_trained" value="<?php  echo $row['customers_trained'];?>" class="form-control" required="true"></div>
                                                    </div>
                                                    <div class="form-group"><label for="city" class=" form-control-label">Rating</label><input type="text" name="rating" id="rating" value="<?php  echo $row['rating'];?>" class="form-control" required="true"></div>
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                    </div>
                                                    <?php } ?>
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Update
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>