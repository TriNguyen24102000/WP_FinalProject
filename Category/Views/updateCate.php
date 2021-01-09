<?php

session_start();
include(__DIR__ . '/../Service/CategoryService.php');
$cateService = new CategoryService(new CategoryRepo());
$categories = $cateService->getAllCategories();
$cateID = $_GET['cateID'];
$category = $cateService->getCategoryById($cateID);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Update Form</title>
  <link rel="stylesheet" type="text/css" href="css/updateForm.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <div class="container right-panel-active" id="container">
    <form action="checkUpdateCate.php" method="POST">
      <h1 style="padding-top: 15px">Update Category</h1>
      <br>
      <div>
        <label>Name: </label>
        <input type="text" name="name" value="<?php echo $category['name']; ?>">
      </div>

      <input type="hidden" name="cateID" value="<?php echo $cateID ?>">

      <br>
      <span>
        <label>Create Date: </label>
        <input type="text" disabled name="email" value="<?php echo $category['createAt']; ?>">
      </span>

      <br>
      <span>
        <label>Last Update: </label>
        <input type="text" disabled name="email" value="<?php echo $category['updateAt']; ?>">
      </span>

      <br>
      <button type="submit" style="margin-top:5px">Update</button>
    </form>
    </script>

</body>

</html>