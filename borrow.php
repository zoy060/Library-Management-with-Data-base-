<?php
require_once "includes/config_session.inc.php";
require_once "includes/connect.php";
require_once 'login/login.model.php';


// require_once "login/login.control.php";

//ALTER TABLE borrowed_by CHANGE `return_date` `return_date` datetime DEFAULT DATE_ADD(`issue`,interval 10 day);

//ALTER TABLE borrowed_by CHANGE `issue` `issue` datetime DEFAULT CURRENT_TIMESTAMP;

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $z = $_POST["borrow"];
    if (isset($_SESSION["user"])) {
        
        echo '<center><li>You can borrow this book</li></center>';
        // echo $_SESSION["user"];
        
        $currentUser = get_user($con, $_SESSION["user"]);
        $currentUsername = $currentUser["member_id"];

        try {
            $sql = "INSERT INTO `borrowed_by`( `book_id`, `member_id`) VALUES (:bookId, :username)";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":bookId", $z);
        $stmt->bindParam(":username", $currentUsername);

        $stmt->execute();

        echo "<center><h2>You Borrowed this book Successfully</h2></center>";
        } catch (PDOException $th) {
            die("Failed to borrow,". $th->getMessage());
        }

        
    } else {
        echo '<center><h1>You can not borrow this book</h2></center>';
    }

}
