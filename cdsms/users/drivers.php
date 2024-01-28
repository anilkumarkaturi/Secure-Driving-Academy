<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cdsmsuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CDSMS Application History</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="../admin/vendors//bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/vendors//font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/vendors//themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../admin/vendors//flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/vendors//selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../admin/assets//css/style.css">

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
                        <h1>Application History</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="hsitory-application.php">Application History</a></li>
                            <li class="active">Application</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">View Application</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
            
            <th>Driver Name</th>
            <th>Driver Contact</th>  
            <th>Driver Address</th>
            <th>No.of.customers trained</th>
            <th>Rating</th>
 </tr>
                                        </tr>
                                        </thead>
                                    <?php
                                    $uid=$_SESSION['cdsmsuid'];
#$ret=mysqli_query($con,"select tblregusers.ID,tblregusers.FirstName,tblregusers.LastName,tblregusers.MobileNumber,tblregusers.Email,tblpackages.PackageName,tblapplication.ID as aapid,tblapplication.PackID,tblapplication.Status,tblapplication.RegNumber,tblapplication.UserId,tblapplication.TakenFor,tblapplication.RegDate,tblapplication.PackID from tblapplication join tblpackages on tblpackages.ID=tblapplication.PackID join tblregusers on tblregusers.ID=tblapplication.UserId where (tblapplication.UserId='$uid')");
$ret=mysqli_query($con,"select employee.emp_id,employee.emp_fname,employee.emp_addr,employee.emp_contact,employee.customers_trained,employee.rating from employee");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['emp_fname'];?></td>
                  <td><?php  echo $row['emp_contact'];?> <?php  echo $row['LastName'];?></td>
                  <td><?php  echo $row['emp_addr'];?></td>
                  <td><?php  echo $row['customers_trained'];?></td>
                  <td><?php  echo $row['rating'];?></td>
                  
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../admin/vendors//jquery/dist/jquery.min.js"></script>
    <script src="../admin/vendors//popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/vendors//bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../admin/assets//js/main.js"></script>


</body>

</html>
<?php }  ?>