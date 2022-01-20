<?php
session_start();
include'../db/dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet" />
    <link href="../css/admin.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <script>
          var found='false';
          $(document).ready(function(){
              $("#search").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#myDiv tr").filter(function() {
                      if($(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)){
                          found='true';
                      }
                      // alert('success')
                  });
                  if(found =='true')
                                    {
                                        $(this).show();
                                    }
                                    else{
                                        $(this).hidden();
                                    }
              });
          });
          </script>
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="../images/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Users</h3>
				<div class="row" id="myDiv">
				
<!--                  search -->
	               <div class="mx-auto" style="width: 200px;">
                       <input type="text" name="search" id="search" class="form-control" placeholder="Search" >

                   </div>
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>Contact no.</th>
                                  <th>Reg. Date</th>
                                  <th>Department</th>
                              </tr>
                              </thead>
                              <tbody id="myTable">
                              <?php $ret=mysqli_query($con,"select * from users");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['contactno'];?></td>
                                  <td><?php echo $row['joining_date'];?></td>
                                  <td><?php echo $row['department'];?></td>

                                  <td>
                                     
                                     <a href="update-profile.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button></a>
                                     <a href="manage-users.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-ban "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
  <script>
      $(document).ready(function(){
          $("#search").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#myDiv *").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                  echo "successful";
              });
          });
      });
      // $(function(){
      //     $('select.styled').customSelect();
      // });
      //
      // $(document).ready(function()){
      //     $('search').keyup(function()){
      //         search_table($(this.val());
      //     });
      //
      //         function search_table(value){
      //             $('#users tr').forEach(function(){
      //               var found='false';
      //               $(this).forEach(function(){
      //                  if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
      //                  {
      //                      found = 'true';
      //                  }
      //               });
      //               if(found =='true')
      //               {
      //                   $(this).show();
      //               }
      //               else{
      //                   $(this).hidden();
      //               }
      //             });
      //         }
      // });

<!--  </script>-->

  </body>
</html>
<?php } ?>