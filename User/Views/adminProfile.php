<?php

//include_once('/Applications/XAMPP/xamppfiles/htdocs/WP_FinalProject/header.php');

?>

<?php

if (isset($_GET['error'])) {
	if ($_GET['error'] == "updateFail")
		echo "<script>alert('Update Failed');</script>";
}
if (isset($_GET['deleteStatus'])) {
	if ($_GET['deleteStatus'] == "true");
	echo "<script>alert('Delete Success');</script>";
}
if (isset($_GET['updateStatus'])) {
	if ($_GET['updateStatus'] == "true");
	echo "<script>alert('Update Success');</script>";
}

?>

<?php

session_start();
include_once(__DIR__ . '/../Service/UserService.php');

$GLOBALS['id'] = null;
$userService = new UserService(new UserRepo);
$data = $userService->getAllUsers();
$index = 1;

?>


<!DOCTYPE html>
<html>

<head>
	<title>Aduma</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">

	<!-- Bootstrap -->
	<link href="css/bootstrap/bootstrap.css" rel="stylesheet">
	<!-- styles -->
	<link href="css/styleAdmin.css" rel="stylesheet">
	<link href="admin/css/chart.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<!--DatePicker-->
	<!-- jQuery UI -->
	<link href="admin/vendor/jquery/jquery-ui.min.js" rel="stylesheet" media="screen">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="admin/vendor/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
	<link href="admin/vendor/select/bootstrap-select.min.css" rel="stylesheet">
</head>

<body>

	<div class="row">
		<div class="col-md-6">
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title">
						<h2>Quản lý tài khoản</h2>
					</div>

					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>Number</th>
								<th>User Name</th>
								<th>Password</th>
								<th>Day of Birth</th>
								<th>Full Name</th>
								<th>Address</th>
								<th>Phone</th>
							</tr>
						</thead>
						<tbody>


							<?php foreach ($data as $user) : ?>
								<?php if ($user['roleID'] != 1) {
									$orgDate = $user['dob'];
									$newDate = date("d-m-Y", strtotime($orgDate));
								?>
									<tr>
										<td><?php echo $index++; ?></td>
										<td><?php echo $user['username']; ?></td>
										<td><?php echo $user['password']; ?></td>
										<td><?php echo $newDate; ?></td>
										<td><?php echo $user['name']; ?></td>
										<td><?php echo $user['address']; ?></td>
										<td><?php echo $user['phone']; ?></td>

										<td><a href="action.php?action=deleteUser&uid=<?php echo $user['userID']; ?>"><img class="icon-util" src="Images/trash.png" alt="Delete"></a></td>
										<td><a href="action.php?action=updateUser&uid=<?php echo $user['userID']; ?>"><img class="icon-util" src="Images/edit.png" alt="Update"></a></td>
									</tr>
								<?php } ?>
							<?php endforeach; ?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
</body>

</html>

<?php

//include_once('/Applications/XAMPP/xamppfiles/htdocs/WP_FinalProject/footer.php');

?>