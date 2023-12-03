<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $search = $_POST["search"];
    if(empty($_POST['Search%By'])){
        $option = 0;
    }else{
        $option = $_POST['Search%By'];
    }
    try {
        require_once 'includes/connect.php';
        $sql = "";
        switch ($option) {
            case 0:
                $sql = "SELECT *  FROM `books` WHERE Title LIKE '%" . htmlentities($search) . "%' OR Author LIKE '%" . htmlentities($search) . "%' OR Book_ID LIKE '%" . htmlentities($search) . "%';";
                break;
            case 1:
                $sql = "SELECT *  FROM `books` WHERE Title LIKE '%" . htmlentities($search) . "%';";
                break;
            case 2:
                $sql = "SELECT * FROM `books` WHERE Author LIKE '%" . htmlentities($search) . "%';";
                break;
            case 3:
                $sql = "SELECT * FROM `books` WHERE Book_ID LIKE '%" . htmlentities($search) . "%';";
                break;
            default:
                $sql = "SELECT *  FROM `books` WHERE Title LIKE '%" . htmlentities($search) . "%';";
                break;
        }

        $stmt = $con->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        function SearchData($result)
        {
            $n = sizeof($result) - 1;
            echo "<table border='1' class='m-2  text-center'>";
            //Table title print
            echo "<tr>";
            foreach ($result[0] as $x => $x_value) {
                echo "<th>" . $x . "</th>";
            }
            echo "</tr>";
            //table data print
            for ($i = 0; $i <= $n; $i++) {
                echo "<tr>";
                foreach ($result[$i] as $x_value) {
                    echo "<td><a href=''>" . $x_value . "</a></td> ";
                }
                //connect to the borrow file
                echo '<td>
            <form action="borrow.php" method="post">
            <input name="borrow" style="display: none;" type="text" value="' . $result[$i]["Book_ID"] . '">
            <button id="borrow">Borrow</button>
            </form>
            </td>';
                echo "</tr>";
            }

            echo "</table>";
        }
        $stmt = null;
        $con = null;
    } catch (PDOException $th) {
        die("Failed" . $th->getMessage());
    }
}
