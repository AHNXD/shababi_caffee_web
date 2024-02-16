<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/addArticle.css">
    <title>Add Article</title>
</head>
<body>
    <script src="../js/jquery.js" defer></script>
    <script defer>
        function addArticle(){
            var title = document.getElementById("title").value;
            var category = document.getElementById("catID").value;
            var description = document.getElementById("description").value;
            var authorName = document.getElementById("authorName").value;
            var article = document.getElementById("article").value;
            var photo = document.getElementById("photo").value;

            $.ajax({
                type: "POST",
                url: "../database/checkArticle.php",
                data: {
                    title: title,
                    category: category,
                    description: description,
                    authorName: authorName,
                    article: article,
                    photo: photo
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == "success") 
                    {
                        alert("Article added successfully");
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
                <div class="title-admin"><h1>Add Article</h1></div>
                <form class="addArticle">
                        <div class="field">
                            <input id="title" name="title" type="text" placeholder="Article Title" required>
                        </div>
                        <div class="field">
                            <input id="catID" name="catID" list="catList" type="text" placeholder="Category" required>
                            <datalist id="catList">
                                <?php
                                    include("../database/connection.php");  
                                    $sql = "SELECT * FROM categories";
                                    $data = mysqli_query($connection, $sql);
                                    
                                    if ($data->num_rows > 0) {
                                        $rows = $data->fetch_all(MYSQLI_ASSOC);
                                        for($i = 0 ; $i < count($rows) ; $i++){
                                            $title = $rows[$i]['category_name'];
                                            $id = $rows[$i]['ID'];

                                            echo "<option value='$id'>$title</option>"; 
                                        }
                                    }
                                    $connection->close();
                                ?>
                            </datalist>
                        </div>
                        <div class="field">
                            <input id="description" name="description" type="text" placeholder="Description" required>
                        </div>
                        <div class="field">
                            <input id="authorName" name="authorName" type="text" placeholder="Author Name" required>
                        </div>
                        <div class="field">
                            <textarea id="article" name="article" cols="80" rows="3" required></textarea>
                        </div>
                        <div class="field">
                            <input id="photo" name="photo" type="text" placeholder="Photo Name" required>
                        </div>
                        <div class="field_btn">
                            <button id="btnCat" class="button-64" role="button" onclick="addArticle()"><span class='text'>ADD</span></button>
                        </div>
                        <button class="button-85" role="button" onclick="history.back()">Go Back</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>