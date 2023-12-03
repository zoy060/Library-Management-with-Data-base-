<link rel="stylesheet" href="../css/login.css">
<?php
require_once '../includes/connect.php';



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['fname'] . " " . $_POST['lname'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    try {
        $sql = "SELECT username FROM member WHERE username = :username";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":username", $user);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        //check user already exsist
        if(!is_bool($result) && $result['username'] == $user){
            echo "<p>This username is already taken</p>";
            die();
        }

        //email check
        $sql = "SELECT email FROM member WHERE email = :email";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!is_bool($result) && $result['email'] == $email){
            echo "<p>This email is already used</p> ";
            die();
        }

        $sql = "INSERT INTO `member`(`Name`, `username`, `email`, `pass`) VALUES ( :fullname, :username, :email, :pwd);";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":fullname", $name);
        $stmt->bindParam(":username", $user);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $pwd);

        $stmt->execute();
        
        $success = '<h2 class="center">Your account created successfully</h2>   <br>   <a class="nav-link active center" aria-current="page" href="../">Home</a> ';
        echo  $success;

        //header("Location: signup.php");

        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $th) {
        die("Failed: ". $th->getMessage());
    }

    function s_massege(){
        global $success;
        if ($success === "success") {
            echo '<p>Signup Success</p>     ';
        }else{
            echo "<p>Signup Unsuccess</p>";
        }
    }
    
}

