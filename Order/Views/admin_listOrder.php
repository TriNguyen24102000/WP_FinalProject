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
include_once(__DIR__ . '/../Service/OrderService.php');

$GLOBALS['id'] = null;
$orderService = new OrderService(new OrderRepo());
$orders = $orderService->getAllOrders();
$index = 1;
include_once(__DIR__ . '/../../headerAdmin.php');
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
	<link href="../../User/Views/css/styleAdmin.css" rel="stylesheet">
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
		<div class="col-md-12">
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title">
						<h2>Orders Management</h2>
					</div>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>Number</th>
								<th>User ID</th>
								<th>Total</th>
								<th>Create Date</th>
								<th>Update Date</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($orders as $order) : ?>
								<!-- <?php if ($order['roleID'] != 1) {
												$orgDate = $user['dob'];
												$newDate = date("d-m-Y", strtotime($orgDate));
											?> -->
								<tr>
									<td><?php echo $index++; ?></td>
									<td><?php echo $order['userID']; ?></td>
									<td><?php echo '$' . $order['totalPrice']; ?></td>
									<td><?php echo $order['createAt']; ?></td>
									<td><?php echo $order['updateAt']; ?></td>
									<td><a href="action.php?action=deleteOrder&orderID=<?php echo $order['orderID']; ?>"><img class="icon-util" src="../../User/Views/Images/trash.png" alt="Delete"></a></td>
									<td><a href="action.php?action=updateOrder&orderID=<?php echo $order['orderID']; ?>"><img class="icon-util" src="../../User/Views/Images/edit.png" alt="Update"></a></td>
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