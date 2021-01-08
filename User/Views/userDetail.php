<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php
include_once('../Service/UserService.php');

$userService = new UserService(new UserRepo);
$data = $userService->getUserByID(1);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="Images/LoginImage.jpg" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            <?php echo $data['name']; ?></h4>
                        <small><?php echo $data['address']; ?><i class="glyphicon glyphicon-map-marker">
                            </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?php echo $data['email']; ?>
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><?php echo $data['phone']; ?>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i><?php echo date("F j, g:i a", strtotime($data['dob'])); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>