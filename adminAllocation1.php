<?php


include_once('database_connection.php');

$uname = '';

$query = "
	SELECT uname FROM regtutor GROUP BY uname ORDER BY uname ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
	$uname .= '<option value="'.$row["uname"].'">'.$row["uname"].'</option>';
}

?>
<?php


include_once('database_connection.php');

$email = '';

$query = "
	SELECT email FROM regtutor GROUP BY email ORDER BY email ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
	$email .= '<option value="'.$row["email"].'">'.$row["email"].'</option>';
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/icon1.png" type="image/png">
	<title>Vintage University E-Tutoring WEB</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="jquery.lwMultiSelect.js"></script>
		<link rel="stylesheet" href="jquery.lwMultiSelect.css" />
		<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="jquery.lwMultiSelect.js"></script>
		<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>

	<!--=== Start Header Menu Area ===-->
	<header class="header_area">
		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-sm-6 col-4 header-top-left">
						<a href="tel:+9530123654896">
							<span class="lnr lnr-phone"></span>
							<span class="text">
								<span class="text">+(254)708855234</span>
								
							</span>
						</a>
						<a href="mailto:support@colorlib.com">
							<span class="lnr lnr-envelope"></span>
							<span class="text">
								<span class="text">info@vintageuniversity.ac.ke</span>
							</span>
						</a>
					</div>
					<div class="col-lg-6 col-sm-6 col-8 header-top-right">
						<a href="index.html" class="text-uppercase">Log Out</a>
					</div>
				</div>
			</div>
		</div>

		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="adminAllocation.php">Single Allocation</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================ End Header Menu Area =================-->

		<br /><br />
		<div class="container" style="width:600px;">
			<h2 align="center">BULK ALLOCATION</h2><br /><br />
			<form method="post" id="insert_data">
				<select name="tuname" id="tuname" class="form-control action">
					<option value="">Select Tutor UserName</option>
					<?php echo $uname; ?>
				</select>
				<br />
				<select name="temail" id="temail" class="form-control action">
					<option value="">Select Tutor Email Address</option>
					<?php echo $email; ?>
				</select>
				<br />
				<select name="fetchedStudentData" id="fetchedStudentData" multiple class="form-control">
				</select>
				<br />
				<input type="hidden" name="selectedStudentData" id="selectedStudentData" />
				<input type="submit" name="insert" id="action" class="btn btn-info" value="Save Allocation" />
				
			</form>
		</div>
		<br>
		<br>
		<br>
		<!--================ Start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Doucuments & Source Files</a></li>
						<li><a href="img/V.U.W DATA.xlsx">Data Dashboard</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4> Top Products</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Inventory</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					
				</div>
				<div class="col-lg-4 col-md-6 single-footer-widget">
				</div>
			</div>
			<div class="row footer-bottom d-flex justify-content-between">
				<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright © 2020 All rights reserved | by <a href="#">Mihir,Ndugire,Mital,Ruth,Cleaveland</a></p>
				<div class="col-lg-4 col-sm-12 footer-social">
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->
</body>

	</body>
</html>

<script>
$(document).ready(function(){

	$('#fetchedStudentData').lwMultiSelect();

	$('.action').change(function(){
		if($(this).val() != '')
		{
			var action = $(this).attr("id");
			var query = $(this).val();
			var result = '';
			if(action == 'tuname')
			{
				result = 'fetchedStudentData';
			}
			$.ajax({
				url:'fetch.php',
				method:"POST",
				data:{action:action, query:query},
				success:function(data)
				{
					$('#'+result).html(data);
					if(result == 'fetchedStudentData')
					{
						$('#fetchedStudentData').data('plugin_lwMultiSelect').updateList();
					}
				}
			})
		}
	});

	$('#insert_data').on('submit', function(event){
		event.preventDefault();
		if($('#tuname').val() == '')
		{
			alert("Please Select Tutor");
			return false;
		}
		else
		{
			$('#selectedStudentData').val($('#fetchedStudentData').val());
			var form_data = $(this).serialize();
			$.ajax({
				url:"insertBulk.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{

					if(data == 'done')
					{
						$('#fetchedStudentData').html('');
						$('#fetchedStudentData').data('plugin_lwMultiSelect').updateList();
						$('#fetchedStudentData').data('plugin_lwMultiSelect').removeAll();
						$('#insert_data')[0].reset();
						alert('Allocation Implemented');
					}
				}
			});
		}
	});

});
</script>



