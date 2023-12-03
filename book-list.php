<?php

require_once "includes/connect.php";

$sql = "SELECT * FROM `books`";

$stmt = $con->prepare($sql);
$stmt->execute();

$bookList = $stmt->fetchAll(PDO::FETCH_ASSOC);


// echo "<pre>";
// print_r($bookList);
// echo "</pre>";

// echo sizeof($bookList);

function bookList($bookList)
{
        $n = sizeof($bookList);

        for ($i = $n - 1; $i >= 0; $i--) {
                echo '<form class="m-0 p-0 mt-3">      <button class="h-100 btn">';
                echo    '<div class="card h-100 p-0 m-0">
                        <img src="cover/1 (' . $n + 1 - $i . ').webp" class="card-img-top p-3 img" alt="">
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

$stmt = null;
$con = null;
