<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoy Library</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        h1 {
            opacity: 1;
            text-align: center;
        }

        table {
            background-color: #fff;
            margin: auto;

        }

        td,
        th {
            border: 1px solid black;
        }

        .img {
            width: 200px;
        }
    </style>

</head>

<body>
    <div class="container one">

        <header>
            <h1>Add New Books to the library</h1>
        </header>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="name">Book Title</label>
            <input type="text" name="title" id="name">
            <br>
            <br>

            <label for="description">Book Description</label>
            <input type="text" name="description" id="description">
            <br>
            <br>

            <label for="author">Book Author</label>
            <input type="text" name="author" id="author">
            <br>
            <br>

            <label for="price">Book Price</label>
            <input type="number" name="price" id="price">
            <br>
            <br>

            <label for="publisher">Publisher ID</label>
            <input type="number" name="pub" id="publisher">
            <br>
            <br>
            <button type="submit" name="submit">Submit</button>
        </form>

        <?php
        include_once "add-book.php";
        if (isset($_POST['submit'])) {

            $title = $_POST['title'];
            $description = $_POST['description'];
            $author = $_POST['author'];
            $price = $_POST['price'];
            $pub = $_POST['pub'];

            // addbook($title, $description, $author, $price, $pub);
            if(addbook($title, $description, $author, $price, $pub)){
                echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  An example success alert with an icon
                </div>';
            }else{
                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                  An example danger alert with an icon
                </div>';
                die();
            }
        }
        ?>

        <script src="../bootstrap/js/bootstrap.js"></script>

</body>

</html>