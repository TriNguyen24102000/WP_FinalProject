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
                <input type="text" name="fullName" placeholder="Full Name">
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
    <script type="text/javascript">
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });
    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>

</body></html>

<link rel="preload" href="/static/bundles/es6/ConsumerUICommons.css/01aad45fe5a8.css" as="style" type="text/css" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/ConsumerAsyncCommons.css/0608bd6190e0.css" as="style" type="text/css" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/Consumer.css/d353972ed5a8.css" as="style" type="text/css" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/FeedPageContainer.css/263e0ec404b3.css" as="style" type="text/css" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/FeedSidebarContainer.css/5c0e5c506162.css" as="style" type="text/css" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/Vendor.js/c911f5848b78.js" as="script" type="text/javascript" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/en_US.js/486fe5cb40be.js" as="script" type="text/javascript" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/ConsumerLibCommons.js/74062289af79.js" as="script" type="text/javascript" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/ConsumerUICommons.js/d7965a23d052.js" as="script" type="text/javascript" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/ConsumerAsyncCommons.js/7da0c1e71d75.js" as="script" type="text/javascript" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/Consumer.js/260e382f5182.js" as="script" type="text/javascript" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/FeedPageContainer.js/7755307b58f7.js" as="script" type="text/javascript" crossorigin="anonymous"/>
    <link rel="preload" href="/static/bundles/es6/FeedSidebarContainer.js/f56029afe829.js" as="script" type="text/javascript" crossorigin="anonymous"/>
    <link rel="prefetch" as="script" href="/static/bundles/es6/DesktopStoriesPage.js/7a0451e46be5.js" type="text/javascript" crossorigin="anonymous"/>
    <link rel="prefetch" as="stylesheet" href="/static/bundles/es6/DesktopStoriesPage.css/35da7cc4ff22.css" type="text/css" crossorigin="anonymous"/>
    <link rel="preload" href="/graphql/query/?query_hash=24a36f49b32dea22e33c2e6e35bad4d3&amp;variables=%7B%22only_stories%22%3Atrue%2C%22stories_prefetch%22%3Atrue%2C%22stories_video_dash_manifest%22%3Afalse%7D" as="fetch" type="application/json" crossorigin/>
    <link rel="preload" href="/graphql/query/?query_hash=ed2e3ff5ae8b96717476b62ef06ed8cc&amp;variables=%7B%22fetch_media_count%22%3A0%2C%22fetch_suggested_count%22%3A30%2C%22ignore_cache%22%3Atrue%2C%22filter_followed_friends%22%3Atrue%2C%22seen_ids%22%3A%5B%5D%2C%22include_reel%22%3Atrue%7D" as="fetch" type="application/json" crossorigin/>
