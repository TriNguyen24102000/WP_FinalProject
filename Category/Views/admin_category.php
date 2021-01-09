<?php

include_once(__DIR__ . '/../Service/CategoryService.php');

$categoryService = new CategoryService(new CategoryRepo());
$categories = $categoryService->getAllCategories();
$index = 1;
?>

<?php

if (isset($_GET['insertStatus'])) {
  if ($_GET['insertStatus'] == "success")
    echo "<script>alert('Insert Success');</script>";
}

if (isset($_GET['deleteStatus'])) {
  if ($_GET['deleteStatus'] == "success")
    echo "<script>alert('Delete Success');</script>";
}

if (isset($_GET['updateStatus'])) {
  if ($_GET['updateStatus'] == "success")
    echo "<script>alert('Update Success);</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category Admin</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
  <div class="row">
    <div class="col-md-6">
      <div class="content-box-large">
        <div class="panel-heading">
          <h1>Quản lý danh mục</h1>
        </div>
        <div>
          <a id="add" href="action.php?action=addCate">
            <img style="width: 0.7cm; height: 0.7cm" src="Images/plus.png" alt="Add"></a>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Create Date</th>
                <th>Update Date</th>
              </tr>
            </thead>
            <tbody>


              <?php foreach ($categories as $category) : ?>
                <tr>
                  <td><?php echo $index++ ?></td>
                  <td><?php echo $category['name']; ?></td>
                  <td><?php echo $category['createAt']; ?></td>
                  <td><?php echo $category['updateAt']; ?></td>

                  <td><a href="action.php?action=deleteCate&cateID=<?php echo $category['cateID']; ?>"><img style="width: 0.5cm; height: 0.5cm" src="Images/trash.png" alt="Delete"></a></td>
                  <td><a href="action.php?action=updateCate&CateID=<?php echo $category['cateID']; ?>"><img style="width: 0.5cm; height: 0.5cm" src="Images/edit.png" alt="Update"></a></td>
                </tr>
              <?php endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

</body>

</html>