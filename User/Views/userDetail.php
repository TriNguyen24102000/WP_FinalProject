<?php

    session_start();
    include_once(__DIR__ . '/../Service/UserService.php');

    $userService = new UserService(new UserRepo);
    $userID = $_SESSION['uid'];
    $userMatch = $userService->getUserByID($userID);
?>

<html>
<head>
  <title> <?php echo $userMatch['name'];?> </title>
  <link rel="stylesheet" href="css/userDetail.css">
</head>
<body>

<!-- Navbar -->
<div class="nav">
  <div class="container">
    <h1>MY PROFILE</h1>
  </div>
</div>

<!-- Content -->
<div class="content">

  <!-- Profile Section -->
  <div class="profile-section">
    <div class="container">
      <img src="Images/<?php echo $userMatch['avatar'];?>" class="profile-photo">
      <p class="profile-name"><?php echo $userMatch['name'];?></p>
    </div>
  </div>

  <!-- Detail Section -->
  <div class="detail-section">
    <div class="container">

      <div class="card">
        <div class="container">
          <div class="card-title">Day of Birth</div>
          <div class="card-body">
            <?php echo date("F j, Y", strtotime($userMatch['dob'])); ?>
        </div>
        </div>
      </div>

      <div class="card">
        <div class="container">
          <div class="card-title">Phone</div>
          <div class="card-body">
            <?php echo $userMatch['phone'];?>
        </div>
        </div>
      </div>

      <div class="card">
        <div class="container">
          <div class="card-title">Address</div>
          <div class="card-body">
            <?php echo $userMatch['address']; ?>
        </div>
        </div>
      </div>

    </div>
  </div>
</div>


</body>
</html>