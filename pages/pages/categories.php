<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/categories.css">
    <title>Categories</title>
    <?php session_start(); ?>
</head>
<body>
    <div class="wrapper">
        <div class="form-container">
            <div class="form-inner">
                <div class="title-Categories"><h1 style="color: #fb6aae;"><?php echo $_SESSION['user_name'] ?></h1></div>
                <div class="title-Categories"><h2>Categories</h2></div>
                <div class="btns">
                <button id="btnCat" class="button-64" role="button" onclick="goToArticles(0,'All')"><span class='text'>All</span></button>
                    <?php
                        include("../database/connection.php");  
                        $sql = "SELECT * FROM categories";
                        $data = mysqli_query($connection, $sql);

                        if ($data->num_rows > 0) {
                            $rows = $data->fetch_all(MYSQLI_ASSOC);
                            for($i = 0 ; $i < count($rows) ; $i++){
                                $title = $rows[$i]['category_name'];
                                $id = $rows[$i]['ID'];

                                echo "<button id='btnCat' class='button-64' role='button' onClick='goToArticles(\"$id\",\"$title\")'><span class='text'>$title</span></button>"; 
                            }
                        }
                        $connection->close();
                    ?>
                </div>
                <button class="button-85" role="button" onclick="history.back()">Go Back</button>
            </div>
        </div>
    </div>
    <script>
        function goToArticles(id,catName){
            window.location = "articles.php?ID=" + id + "&catName=" + catName;
        } 
    </script>
</body>
</html>

