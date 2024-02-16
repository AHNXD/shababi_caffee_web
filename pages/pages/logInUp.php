<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
    <head>
        <link rel="stylesheet" href="../styles/logInUp.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SignIn/Up</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="title-text">
                <div class="title login">Login</div>
                <div class="title signup">Signup</div>
            </div>
            <div class="form-container">
                <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Login</label>
                    <label for="signup" class="slide signup">Signup</label>
                    <div class="slider-tab"></div>
                </div>
                <div class="form-inner">
                    <form action="../database/login.php" class="login">
                        <div class="field">
                            <input id="email" name="email" type="email" placeholder="Email Address" required>
                        </div>
                        <div class="field">
                            <input id="password" name="password" type="password" placeholder="Password" required>
                        </div>
                        <div class="field btn">
                            <div id = "loginbtn" class="btn-layer"></div>
                            <input type="submit" value="Login">
                        </div>
                        <div class="signup-link">
                            Not a member? <a href="">Signup now</a>
                        </div>
                    </form>
                    <form action="../database/addUser.php" class="signup">
                        <div class="field">
                            <input id="user" name="user" type="text" placeholder="User Name" required>
                        </div>
                        <div class="field">
                            <input id="email" name="email" type="email" placeholder="Email Address" required>
                        </div>
                        <div class="field">
                            <input id="password" name="password" type="password" placeholder="Password" required>
                        </div>
                        <div class="field">
                            <input id="Rpassword" name="Rpassword" type="password" placeholder="Confirm password" required>
                        </div>
                        <input id="isAdmin" name="isAdmin" type="checkbox" value="1"> Admin
                        <div class="field btn">
                            <div class="btn-layer">
                        </div>
                        <input type="submit" value="Signup">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const loginText = document.querySelector(".title-text .login");
            const loginForm = document.querySelector("form.login");
            const loginBtn = document.querySelector("label.login");
            const signupBtn = document.querySelector("label.signup");
            const signupLink = document.querySelector("form .signup-link a");
            signupBtn.onclick = (()=>{
                loginForm.style.marginLeft = "-50%";
                loginText.style.marginLeft = "-50%";
            });
            loginBtn.onclick = (()=>{
                loginForm.style.marginLeft = "0%";
                loginText.style.marginLeft = "0%";
            });
            signupLink.onclick = (()=>{
                signupBtn.click();
                return false;
            });
        </script>
    </body>
</html>