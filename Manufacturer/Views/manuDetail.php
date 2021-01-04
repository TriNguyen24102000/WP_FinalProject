<?php

    $id = $_GET['manID'];
    
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
	<link href="css/style.css" rel="stylesheet">
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
							<div class="panel-title">Basic Table</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Username</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr>
				                  <td>1</td>
				                  <td>Mark</td>
				                  <td>Otto</td>
				                  <td>@mdo</td>
				                </tr>
				                </tr>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Striped Rows</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Username</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr>
				                  <td>1</td>
				                  <td>Mark</td>
				                  <td>Otto</td>
				                  <td>@mdo</td>
				                </tr>
				                <tr>
				                  <td>2</td>
				                  <td>Jacob</td>
				                  <td>Thornton</td>
				                  <td>@fat</td>
				                </tr>
				                <tr>
				                  <td>3</td>
				                  <td>Larry</td>
				                  <td>the Bird</td>
				                  <td>@twitter</td>
				                </tr>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Border Table</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-bordered">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Username</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr>
				                  <td>1</td>
				                  <td>Mark</td>
				                  <td>Otto</td>
				                  <td>@mdo</td>
				                </tr>
				                <tr>
				                  <td>2</td>
				                  <td>Jacob</td>
				                  <td>Thornton</td>
				                  <td>@fat</td>
				                </tr>
				                <tr>
				                  <td>3</td>
				                  <td>Larry</td>
				                  <td>the Bird</td>
				                  <td>@twitter</td>
				                </tr>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Hover Rows</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-hover">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Username</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr>
				                  <td>1</td>
				                  <td>Mark</td>
				                  <td>Otto</td>
				                  <td>@mdo</td>
				                </tr>
				                <tr>
				                  <td>2</td>
				                  <td>Jacob</td>
				                  <td>Thornton</td>
				                  <td>@fat</td>
				                </tr>
				                <tr>
				                  <td>3</td>
				                  <td>Larry</td>
				                  <td>the Bird</td>
				                  <td>@twitter</td>
				                </tr>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Condensed Table</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-condensed">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Username</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr>
				                  <td>1</td>
				                  <td>Mark</td>
				                  <td>Otto</td>
				                  <td>@mdo</td>
				                </tr>
				                <tr>
				                  <td>2</td>
				                  <td>Jacob</td>
				                  <td>Thornton</td>
				                  <td>@fat</td>
				                </tr>
				                <tr>
				                  <td>3</td>
				                  <td>Larry</td>
				                  <td>the Bird</td>
				                  <td>@twitter</td>
				                </tr>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Table with row classes</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Username</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr class="success">
				                  <td>1</td>
				                  <td>Mark</td>
				                  <td>Otto</td>
				                  <td>@mdo</td>
				                </tr>
				                <tr class="danger">
				                  <td>2</td>
				                  <td>Jacob</td>
				                  <td>Thornton</td>
				                  <td>@fat</td>
				                </tr>
				                <tr class="warning">
				                  <td>3</td>
				                  <td>Larry</td>
				                  <td>the Bird</td>
				                  <td>@twitter</td>
				                </tr>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
  			</div>

  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Responsive Tables</div>
				</div>
  				<div class="panel-body">
  					<div class="table-responsive">
  						<table class="table">
			              <thead>
			                <tr>
			                  <th>#</th>
			                  <th>First Name</th>
			                  <th>Last Name</th>
			                  <th>Username</th>
			                </tr>
			              </thead>
			              <tbody>
			                <tr>
			                  <td>1</td>
			                  <td>Mark</td>
			                  <td>Otto</td>
			                  <td>@mdo</td>
			                </tr>
			                <tr>
			                  <td>2</td>
			                  <td>Jacob</td>
			                  <td>Thornton</td>
			                  <td>@fat</td>
			                </tr>
			                <tr>
			                  <td>3</td>
			                  <td>Larry</td>
			                  <td>the Bird</td>
			                  <td>@twitter</td>
			                </tr>
			              </tbody>
			            </table>
  					</div>
  				</div>
  			</div>




		  </div>
		</div>
    </div>


      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/v3.0.3/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="admin/js/custom.js"></script>
    <script src="admin/js/tables.js"></script>
  </body>
</html>