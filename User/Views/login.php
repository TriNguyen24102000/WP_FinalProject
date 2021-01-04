<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="checkSignup.php" method="GET">
                <h1 style="padding-top: 15px"> Create Account</h1>
                <input type="text" name="fullName" placeholder="Full Name">
                <input type="text" name="userName" placeholder="User Name">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="confirmPassword" placeholder="Confirm Password">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="phone" placeholder="Phone Number">
                <input type="date" name="dob" placeholder="Date of Birth (yyyy-mm-dd)">
                <button style="margin-top:5px"> Create Account</button>
                <h5>Already have an account! <a class="ghost" id="signIn" style="color:blue;"><u>Sign In</u></a></h5>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="checkSignin.php" method="POST">
                <img src="Images/apple.webp" alt="logo" class="img-brand">
                <input type="text" name="userName" placeholder="User Name">
                <input type="password" name="password" placeholder="Password">
                <a href="#" style="padding-left:150px; font-weight: bold"> Forgot Your Password?</a>
                <button style="margin-top: 10px"> Login</button><br>
                <h5>Don't have any account? <a class="ghost" id="signUp" style="color:blue;"><u>Sign Up</u></a></h5>
            </form>
            
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="Images/loginWP.jpg" id="img-display" alt="movie-1" height="500" width="500"/>
                    
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="Images/signup.jpg" id="img-display" alt="movie-2" height="500" width="500"/>
                </div>
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
</body>
</html>