<?php

    include('../Service/UserService.php');
    $userService = new UserService(new UserRepo);
    $users = $userService->getAllUsers();
    $userID = $_GET['uid'];

    $userMatchWithID = $userService->getUserByID($userID);
    $dob = DateTime::createFromFormat("Y-m-d H:i:s", $userMatchWithID['dob']);
    //or using explode() function to split by delimeter "-" to get correspond year, month, day.
    
    //get specify dob by split dob.
    $dob_day = $dob->format("d");
    $dob_month = $dob->format("m");
    $dob_year = $dob->format("Y");

    $address = array("Hanoi", "Ho Chi Minh City", "United State Of Americano", "From Hell");
?>

<!DOCTYPE html>
<html><head>
    <title>Update Form</title>
    <link rel="stylesheet" type="text/css" href="css/updateForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container right-panel-active" id="container">
                <form action="checkSignup.php" method="POST">
                    <h1 style="padding-top: 15px"> User Profile </h1>
                    <div>
                        <label>Name:   </label>
                        <input type="text" name="name" value="<?php echo $userMatchWithID['name']; ?>">
                    </div>

                    <div>
                        <label>User Name:</label>
                        <input type="text" name="username" value="<?php echo $userMatchWithID['username']; ?>">
                    </div>

                    <span>
                        <label>Email:  </label>
                        <input type="email" name="email" value="<?php echo $userMatchWithID['email']; ?>">
                    </span>
                    
                    <span>
                        <label>Phone:   </label>
                        <input type="text" name="phone" value="<?php echo $userMatchWithID['phone']; ?>">
                    </span>
                    
                    <br>
                    <span>
                    <label style="margin: 10px 2px 10px -90px;">Address</label>
                        <select name="address" id="address">
                            <?php foreach($address as $addr){ 
                                if($addr == $userMatchWithID['address'])
                                    echo "<option value= " . "$addr" . " selected= " . '"selected"' .  ">$addr</option>"; 
                                else  
                            ?>
                                <option value="<?php echo $addr ?>"><?php echo $addr ?></option>
                            <?php } ?>
                        </select>
                    <span>
                    <br>
                    <br>
                    <span>
                        <label>Birthday: </label>
                        <span>
                            <label>Day: </label>
                            <select name="Day">
                                <?php 
                                    for($i = 1; $i <= 31; ++$i) {
                                        if($i == $dob_day)
                                            echo "<option value= " . "$i" . " selected= " . '"selected"' .  ">$i</option>";   
                                        else     
                                ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php }?>
                            </select>

                            <label>Month: </label>
                            <select name="Month">
                                <?php 
                                    for($i = 1; $i <= 12; ++$i) {
                                        if($i == $dob_month)
                                            echo "<option value= " . "$i" . " selected= " . '"selected"' .  ">$i</option>";   
                                        else 
                                ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                            </select>

                            <label>Year: </label>
                            <select name="Year">
                                <?php
                                    for($i = date("Y"); $i >= 1900; --$i) {
                                        if($i == $dob_year)
                                            echo "<option value= " . "$i" . " selected= " . '"selected"' .  ">$i</option>";   
                                        else 
                                ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php }?>
                            </select>
                        </span>
                        
                        <br>
                        <div style="margin: 10px 0px 10px -220px;">
                            <label>Role: </label>
                            <select name="role">
                                <?php if($userMatchWithID['roleID'] == 2)?>
                                    <option value="2" selected="selected">User</option>
                                <?php if($userMatchWithID['roleID'] != 2) ?>
                                    <option value="1">Admin</option>
                            </select>
                        </div>
                    <br><br>
                    <button type="submit" style="margin-top:5px" > Update</button>
                </form>
</script>

</body></html>
