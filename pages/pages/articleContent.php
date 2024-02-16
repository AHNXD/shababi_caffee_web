<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/articleContent.css">
    <?php session_start(); ?>
    <title>Content</title>
</head>
<body>
    <script src="../js/jquery.js" defer></script>
    <script defer>
        function addComment(id){
            var comment = document.getElementById("comment").value;

            $.ajax({
                type: "POST",
                url: "../database/addComment.php",
                data: {article_ID: id, comment: comment},
                dataType: "json",
                success: function(data) {
                    if (data.status == "success") 
                    {
                        //alert("Comment added successfully");
                        location.reload();
                    }
                    else alert(data.message);
                },
                error: function(xhr, status, error) {
                    alert("An error occurred");
                }
            });
        }
        function deleteComment(id){
            $.ajax({
                type: "POST",
                url: "../database/deleteComment.php",
                data: {comment_ID: id},
                dataType: "json",
                success: function(data) {
                    if (data.status == "success") 
                    {
                        //alert("Comment deleted successfully");
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
    <?php
        $id = $_GET['ID'];
        include("../database/connection.php");
        $sql = "SELECT * FROM article WHERE ID = $id";
        $data = mysqli_query($connection, $sql);

        if ($data->num_rows > 0) {
            $rows = $data->fetch_all(MYSQLI_ASSOC);
            $title = $rows[0]['title'];
            $imageURL = $rows[0]['photo'];
            $content =$rows[0]['content'];
            $author = $rows[0]['author_name'];

            echo " <div class='wrapper'><div class='form-container'><div class='form-inner'>";
            echo "<button class='button-85' role='button' onclick='history.back()'>Go Back</button>";
            echo "<div class='article' >";
            echo "<img class='main-photo' src=\"../photos/$imageURL\" alt=\"$title\">";
            echo "<h1 class='title'> $title </h1>";
            echo $content;
            echo "<h4 class ='author'> $author </h4>";
            echo "</div> </div> </div> </div>";
        }

        $sql = "SELECT c.ID, c.comment,u.ID AS 'userID', u.user_name AS 'user' FROM comments c INNER JOIN users u ON c.user_ID = u.ID WHERE article_ID = $id";
        $data = mysqli_query($connection, $sql);
        $rows = $data->fetch_all(MYSQLI_ASSOC);
        echo " <div class='wrapper'><div class='form-container'><div class='form-inner'>";
        echo "<div class='comments'>";
        echo "<h1>Comments</h1>";
        echo "<div class='field'><input id='comment' name='comment' type='text' placeholder='Type your comment here' required> <button class='btnSend' onclick='addComment($id)'><img class='svg-pic' src='../photos/send1.svg' alt='send'></button></div>";
        echo "<hr>";
        for($i = 0 ; $i < count($rows); $i++){
            $userID = $rows[$i]['userID'];
            $commentID = $rows[$i]['ID'];
            $user_name = $rows[$i]['user'];
            $comment = $rows[$i]['comment'];

            echo "<div class='inner-comment'>";
            echo "<h2 class='user_name'> $user_name :</h2>";
            echo "<div class='div-comment'><h4 class ='comment'> $comment </h4></div>";
            if($_SESSION['user_isAdmin'] == 1) echo "<button class='btnDelete' onclick='deleteComment($commentID)'><img class='del-photo' src='../photos/trash1.svg' alt='trash'></button>";
            else if($_SESSION["user_ID"] == $userID) echo "<button class='btnDelete' onclick='deleteComment($commentID)'><img class='del-photo' src='../photos/trash1.svg' alt='trash'></button>";
            else echo "<div class='divEmp'></div>";
            echo "</div>";
            echo "<hr>";
        }
        echo "</div> </div> </div> </div>";
        $connection->close();
    ?>
</body>
</html>