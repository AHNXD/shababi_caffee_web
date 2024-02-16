<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/articles.css">
    <title>Articles</title>
    <?php session_start(); ?>
</head>
<body>
    <script src="../js/jquery.js" defer></script>
    <script defer>
        function signOut() {
            window.location = "logInUp.php";
        }
        function goToContent(id){
            window.location = "articleContent.php?ID=" + id;
        }
        function addLike(id){
            var likesCount = document.getElementById("likes"+id);
            $.ajax({
                type: "POST",
                url: "../database/like.php",
                data: {article_ID: id},
                dataType: "json",
                success: function(data) {
                    if (data.status == "success") location.reload();
                    else alert(data.message);
                },
                error: function(xhr, status, error) {
                    alert("An error occurred");
                }
            });
        }
        function deleteArticle(id){
            $.ajax({
                type: "POST",
                url: "../database/deleteArticle.php",
                data: {ID: id},
                dataType: "json",
                success: function(data) {
                    if (data.status == "success") 
                    {
                        //alert("Article deleted successfully");
                        location.reload();
                    }
                    else alert(data.message);
                },
                error: function(xhr, status, error) {
                    alert("An error occurred");
                }
            });
        }
    </script>
    <div class="wrapper">
        <div class="form-container">
            <div class="form-inner">
                <div class="title-user">
                    <h1 style="color: #a445b2"><?php echo $_SESSION['user_name']; ?></h1>
                </div>
                <button class='button-85' role='button' onclick='signOut()'>LogOut</button>
                <button class='button-85' role='button' onclick='history.back()'>Go Back</button>
                <hr>
                <h1><?php echo $_GET['catName']; ?></h1>
            </div>
        </div>
    </div>
        <?php
            include("../database/connection.php");
            $id = $_GET['ID'];
            $isAdmin = $_SESSION['user_isAdmin'];
            $sql = "SELECT * FROM article";
            if ($id != 0)
            {
                $sql .= " WHERE category_ID = $id";
            }
            $data = mysqli_query($connection, $sql);

            if ($data->num_rows > 0) {
                $rows = $data->fetch_all(MYSQLI_ASSOC);
                for($i =0 ; $i < count($rows); $i++){
                    $id = $rows[$i]["ID"];
                    $title = $rows[$i]['title'];
                    $imageURL = $rows[$i]['photo'];
                    $explanation =$rows[$i]['description'];

                    $sql = "SELECT COUNT(*) AS 'likes' FROM likes WHERE article_ID = $id";
                    $likesData = mysqli_query($connection, $sql);
                    $likes;
                    if ($data->num_rows > 0) $likes = $likesData->fetch_all(MYSQLI_ASSOC);
                    $likesCount = $likes[0]['likes'];

                    echo "<div class='wrapper'><div class='form-container'><div class='form-inner'>";
                    echo "<div class='article' >";
                    echo "<img class='title_pic' src=\"../photos/$imageURL\" alt=\"$title\">";
                    echo "<h1> $title </h1>";
                    echo "<h4> $explanation </h4>";
                    echo "<hr />";
                    echo "<div class=\"btns\" style='display:flex;justify-content:center;margin:16px;'> <button class='button-64' role='button' onclick='goToContent(\"$id\")''><span class='text'>See More</span></button> <button class='button-64' role='button' onclick='addLike($id)'><img src='../photos/like1.svg' alt='Like'> <p id='likes$id'>$likesCount</p></button></div>";           
                    if($isAdmin) echo "<button class='button-85' role='button' onclick='deleteArticle($id)'>Delete</button>";
                    echo " </div> </div> </div> </div>";
                }
            }
            $connection->close();
        ?>
</body>
</html>