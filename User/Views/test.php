<?php

include('Service/UserService.php');

$userService = new UserService(new UserRepo);
$data = $userService->getAllUsers();



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php foreach ($data as $user) : ?>

    <a href="test_2.php?proid=<?php echo $user['userID']; ?>">Add User <?php echo $user['userID']; ?></a>
  <?php endforeach; ?>
</body>

</html>