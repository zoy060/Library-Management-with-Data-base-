<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/connect.php";

    $sql = "SELECT * FROM member WHERE member_id =" . $_SESSION['id'] . " ;";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $userdata = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // print_r($userdata);
    // echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        .profile {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .profile img {
            border-radius: 50%;
            max-width: 150px;
            margin-bottom: 10px;
        }

        .user-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        table{
            background-color: #fff;
            margin: auto;
            
        }
        td,th{
            border: 1px solid black;
            padding: 10px;
        }
        .center{
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <h1>User Profile</h1>
    </header>

    <div class="container">
        <div class="profile">
            <div class="user-details">
                <h2><?php echo $userdata['Name'] ?></h2>
                <p><?php echo $userdata['email'] ?></p>
                <!-- Add more user details as needed -->
            </div>
        </div>
        <h2 class="center">List of borrowed book</h2>
        <?php
            // $sql = "SELECT  `issue`, `return_date`, `book_id`, `member_id` FROM `borrowed_by` WHERE `member_id` =" . $_SESSION['id'] . ";";
            $sql = "SELECT member.Name AS 'Member Name', books.Title AS 'Book Title', books.Author, borrowed_by.issue, borrowed_by.return_date FROM ((borrowed_by INNER JOIN books ON borrowed_by.book_id = books.Book_ID) INNER JOIN member ON member.Member_ID = borrowed_by.member_id) WHERE member.Member_ID =" . $_SESSION['id'] . " ;";

            $stmt = $con->prepare($sql);
            $stmt->execute();

            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);



            if(!empty($books)){
                $n = sizeof($books);


                echo "<table border='1'>";
            //Table title print
            echo "<tr>";
            foreach ($books[0] as $x => $x_value) {
                echo "<th>" . $x . "</th>";
            }
            echo "</tr>";
            //table data print
            for ($i = 0; $i < $n; $i++) {
                echo "<tr>";
                foreach ($books[$i] as $x_value) {
                    echo "<td>" . $x_value . "</td> ";
                }
                echo "</tr>";
            }

            echo "</table>";


            }else{
                echo "You haven't borrow any book yet";
            }
        ?>
        
    </div>
</body>
</html>
