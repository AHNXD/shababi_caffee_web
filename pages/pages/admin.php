<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>Admin</title>
    <?php session_start(); ?>
</head>
<body>
    <div class="wrapper">
        <div class="form-container">
            <div class="form-inner">
                <div class="title-admin"><h1><?php echo $_SESSION['user_name'] ?></h1></div>
                <div class="btns">
                    <button class="button-64" role="button" onclick="goToCategories()"><span class="text">Categories</span></button>
                    <button class="button-64" role="button" onclick="goToAddArticle()"><span class="text">Add Article</span></button>
                </div>
                <button class="button-85" role="button" onclick="signOut()">Sign Out</button>
            </div>
        </div>
    </div>
    <script>
        function goToAddArticle() {
            window.location = "addArticle.php";
        }
        function goToCategories() {
            window.location = "categories.php";
        }
        function signOut() {
            window.location = "logInUp.php";
        }
    </script>
</body>
</html>