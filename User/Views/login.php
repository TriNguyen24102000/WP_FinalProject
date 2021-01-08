<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container" id="container">
        
        <div class="form-container sign-in-container">
            <form action="checkSignin.php" method="POST">
                
                
                <img src="Images/apple.webp" alt="logo" class="img-brand">
                <?php 
                      if(isset($_GET['error']))
                      {
                          if($_GET['error'] == "wrongLogin")
                              echo "<p>Account not exist. Please check it again</p>";
                          if($_GET['error'] == "emptyField")
                              echo "<p>Empty User Name or Password</p>";
                      }
                
                ?>
                <input type="text" name="userName" placeholder="User Name">
                <input type="password" name="password" placeholder="Password">
                <a href="#" style="padding-left:150px; font-weight: bold"> Forgot Your Password?</a>
                <button style="margin-top: 10px"> Login</button><br>
                <h5>Don't have any account? <a class="ghost" id="signUp" href="signup.php" style="color:blue;"><u>Sign Up</u></a></h5>
            </form>
            
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <img src="Images/signup.jpg" style="object-fit: cover;" id="img-display" alt="movie-2" height="500" width="500"/>
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