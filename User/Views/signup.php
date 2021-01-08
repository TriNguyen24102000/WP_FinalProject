<!DOCTYPE html>
<html><head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container right-panel-active" id="container">
            <div class="form-container sign-up-container">
            <form action="checkSignup.php" method="POST">
                <h1 style="padding-top: 15px"> Create Account</h1>
                <?php

                    if(isset($_GET['success']))
                    {
                        if($_GET['success'] == "createSuccess")
                        {
                            echo "<script>alert('Create Success');</script>";
                        }
                    }
                    if(isset($_GET['error']))
                    {
                        if($_GET['error'] == "signupeemptyField")
                            echo "<p>Some field fucking empty</p>";
                        else if($_GET['error'] == "passwordConfirmIncorrect")
                            echo "<p>Not concide Password with confirm</p>";
                        else if($_GET['error'] == "invalidVietNamePhone")
                            echo "<p>Invalid Viet Nam Phone</p>";
                        else if($_GET['error'] == "createAccountFailed")
                            echo "<p>Create Account Failed</p>";
                        
                    }
                ?>
                <input type="text" name="name" placeholder="Full Name">
                <input type="text" name="userName" placeholder="User Name">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="confirmPassword" placeholder="Confirm Password">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Phone Number">
                <br>
                <span>
                <label style="margin: 10px 2px 10px -31px;">Address</label>
                    <select name="address" id="address">
                        <option value="Ha Noi">Ha Noi</option>
                        <option value="Ho Chi Minh City">Ho Chi Minh City</option>
                        <option value="United State Of Americano">United State Of Americano</option>
                        <option value="From Hell">From Hell</option>
                    </select>
                <span>
                <br>
                <br>
                <span>
                    <label>Day</label>
                    <select name="dob_day" id="dob_day" class="select">
                        <?php for($i = 1; $i <= 31; ++$i) {?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }?>
                    </select>

                    <label>Month</label>
                    <select name="dob_month" id="dob_month" class="select">
                        <?php for($i = 1; $i <= 12; ++$i) {?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }?>
                    </select>

                    <label>Year</label>
                    <select name="dob_year" id="dob_year" class="select">
                        <?php for($i = date("Y"); $i >= 1900; --$i) {?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }?>
                    </select>
                </span>
                <br><br>
                <button style="margin-top:5px" > Create Account</button>
                <h5>Already have an account! <a class="ghost" id="signIn" href="login.php" style="color:blue;"><u>Sign In</u></a></h5>
            </form>
            
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="Images/login.jpg" style="object-fit: cover;" id="img-display" alt="movie-1" height="500" width="500">
            </div>
        </div>
    </div>
</script>

</body></html>
