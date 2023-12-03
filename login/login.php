<?php

require_once 'login.control.php';
require_once 'login.model.php';
require_once '../includes/config_session.inc.php';

if (isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Member Login</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

    <!-- <link rel="stylesheet" href="../css/login.css"> -->
    <style>
        form {
            box-shadow: inset 0px 0px 100px 5px #000;
            border-radius: 20px;
        }

        h2 {
            font-size: 45px;
            font-weight: bolder;
            color: #fff;
            text-align: center;
        }

        body {
            background-image: url(https://miro.medium.com/v2/resize:fit:1200/1*6Jp3vJWe7VFlFHZ9WhSJng.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;

        }

        label {
            color: #fff;
        }
    </style>
</head>

<body>

    <h2 class="p-4">Member Login</h2>
    <div class="container">

        <form class="m-auto p-4 d-flex flex-column justify-content-center align-items-center" action="login.control.php" method="post">

            <div class="col-sm-4 p-2">

                <label for="username" class="form-label">Username</label>

                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <!-- username input -->
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="inputGroupPrepend" placeholder="Username" required>

                </div>
            </div>

            <!-- Email -->
            <!-- <div class="col-md-6  p-2">

                <label for="email" class="form-label">E-mail</label>

                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>

            </div> -->

            <!-- Password -->
            <div class="col-md-4 p-2">

                <label for="password" class="form-label">Password</label>

                <div class="input-group has-validation">
                    <input type="password" class="form-control" name="pwd" id="password" aria-describedby="inputGroupPrepend" placeholder="Password" required>
                    <span class="eye input-group-text" id="inputGroupPrepend">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #1a1a1a
                                }
                            </style>
                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                        </svg>
                    </span>
                </div>

            </div>
            <div class="col-md-4 m-4">
                <button class="btn btn-primary ">Log in</button>
            </div>

            <div class="col-md-4">
                <a class="btn btn-dark" href="../signup/signup.php">Create a new account</a>
            </div>

        </form>


    </div>
        <script src="../js/s.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
</body>

</html>