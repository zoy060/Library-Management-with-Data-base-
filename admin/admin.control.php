<?php
require_once "../includes/connect.php";

//admin login function
function checkUer($con)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];
        //echo $username;
        try {
            $sql = "SELECT * FROM `admin` WHERE `username`= :username AND `pass`= :pwd;";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":pwd", $pwd);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!is_bool($result) && $username == $result['username'] && $pwd === $result['pass']) {


                sleep(1);
                header("Location: admin.php");
            } else {

                echo "<p class='h-3 text-center alert alert-danger '>Your login details is wong</p>";
            }
        } catch (PDOException $th) {
            die("Failed: " . $th->getMessage());
        }
    }
}

// echo "<pre>";
// print_r($result);
// echo "</pre>";






// echo "<pre>";
// print_r($bookList);
// echo "</pre>";

// echo sizeof($bookList);

function bookList($con)
{
    $sql = "SELECT * FROM `books`";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $bookList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $n = sizeof($bookList);

    for ($i = $n - 1; $i >= 0; $i--) {
        echo '<form class="m-0 p-0 mt-3">      <button class="h-100 btn">';
        echo    '<div class="card h-100 p-0 m-0">
                        <img src="../cover/1 (' . $n + 1 - $i . ').webp" class="card-img-top p-3 img" alt="">
                        <div class="card-body">';
        echo        '<h5 class="card-title">' . $bookList[$i]["Title"] . '</h5>';
        echo         '   <p class="card-text">Author : ' . $bookList[$i]["Author"] . ' </p>
                        </div>';
        echo    '<div class="card-footer">
                            <small class="text-muted">Price : ' . $bookList[$i]['Price'] . ' tk</small>
                        </div>';
        echo '    </div>
                  </button>  </form>';
    }
}

// $stmt = null;
// $con = null;
