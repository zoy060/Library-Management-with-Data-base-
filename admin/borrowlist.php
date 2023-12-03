<?php
require_once "../includes/connect.php";



function borrowlist($con) {
    $sql = "SELECT member.Name AS 'Member Name', books.Title AS 'Book Title', books.Author, borrowed_by.issue, borrowed_by.return_date FROM ((borrowed_by INNER JOIN books ON borrowed_by.book_id = books.Book_ID) INNER JOIN member ON member.Member_ID = borrowed_by.member_id);";

            $stmt = $con->prepare($sql);
            $stmt->execute();

            $borrows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $n = sizeof($borrows);
            echo "<table class='table'>";
            //Table title print
            echo "<tr>";
            foreach ($borrows[0] as $x => $x_value) {
                echo "<th scope='col'>" . $x . "</th>";
            }
            echo "</tr>";
            //table data print
            for ($i = 0; $i < $n; $i++) {
                echo "<tr>";
                foreach ($borrows[$i] as $x_value) {
                    echo "<td>" . $x_value . "</td> ";
                }
                echo "</tr>";
            }

            echo "</table>";
}
// $stmt = null;
// $con = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">


</head>
<body>
    <div class="container">
        <?php
            borrowlist($con);
        ?>
    </div>



      <script src="../bootstrap/js/bootstrap.js"></script>

</body>
</html>