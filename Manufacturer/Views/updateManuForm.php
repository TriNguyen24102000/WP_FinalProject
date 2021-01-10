<?php

    session_start();
    include(__DIR__ . '/../Service/ManufacturerService.php');
    $manuService = new ManufacturerRepo(new ManufacturerRepo);
    $manu = $manuService->getAllManus();
    $manuID = $_GET['manuID'];
    $_SESSION['saveManuID'] = $manuID;

    $manuMatchWithID = $manuService->getManuByID($manuID);
?>

<!DOCTYPE html>
<html><head>
    <title>Update Form</title>
    <link rel="stylesheet" type="text/css" href="css/updateForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container right-panel-active" id="container">
                <form action="checkUpdateForm.php" method="POST">
                    <h1 style="padding-top: 15px"> Manu Profile </h1>
                    <br>
                    <div>
                        <label>Name:   </label>
                        <input type="text" name="name" value="<?php echo $manuMatchWithID['name']; ?>">
                    </div>

                    <br>
                    <span>
                        <label>Email:  </label>
                        <input type="email" name="email" value="<?php echo $manuMatchWithID['email']; ?>">
                    </span>
                    
                    <br>
                    <span>
                        <label>Phone:   </label>
                        <input type="text" name="phone" value="<?php echo $manuMatchWithID['phone']; ?>">
                    </span>
                    <br>
                    <button type="submit" style="margin-top:5px" > Update</button>
                </form>
</script>

</body></html>
