<?php
// require_once 'login/login.control.php';
require_once "includes/config_session.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoy Library</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        h1 {
            opacity: 1;
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


        .card-title, .card-text{
            text-wrap: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            
        }

    </style>

</head>

<body>
    <div class="container one">

        <header>
            <h1>Library Management System</h1>
        </header>

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <!-- logo -->
                <a class="navbar-brand" href="#">Library</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../Library">Home</a>
                        </li>
                        <!-- if user logged in hide the login btn -->
                        <?php
                        if (!isset($_SESSION["user"])) {
                            echo '
                            <li class="nav-item">
                                <a class="nav-link" href="login/login.php">Login</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="signup/signup.php">signup</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="admin/admin.login.php">Admin</a>
                            </li>';
                        }
                        ?>

                    </ul>

                    <ul class="navbar-nav  my-2 my-lg-0 navbar-nav-scroll  user">
                        <?php
                        if (isset($_SESSION["user"])) {
                            echo '<li class="nav-item badge bg-primary fs-6"><a class="nav-link " href="profile.php">' . $_SESSION["user"] . '</a></li>';
                            echo '<li class="nav-item "><a class="nav-link" href="logout.php">Logout</a></li>';
                        }
                        ?>
                        <ul>
                </div>
            </div>

        </nav>
        
        <div class="search-part" style="background-color: #e3f2fd;">
            <form class="bg-light d-flex" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


                <select class="form-control m-3 " name="Search%By">
                    <option value="0" disabled selected>Search Book by</option>
                    <option value="1">Title</option>
                    <option value="2">Author</option>
                    <option value="3">ISBN</option>
                </select>


                <input class="form-control m-3" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success m-3" type="submit" name="submit">Search</button>




            </form>
        </div>

        <?php
        // include_once "includes/connect.php";
        require_once "search.php";

        if (isset($_POST['submit'])) {
            SearchData($res);
        }

        ?>

        <div class="container p-2">


            <div class="row row-cols-1 row-cols-md-5 g-4 ">

            <?php 
            if (!isset($_POST['submit'])) {
                require_once 'book-list.php';
                bookList($bookList);
            }
            
            ?>

            </div>
        </div>



    </div>

    <script src="bootstrap/js/bootstrap.js"></script>

</body>

</html>