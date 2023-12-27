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
                echo '<a class="btn" href="https://www.youtube.com/watch?app=desktop&v=cE3U24qSNUQ">';
                echo '<div class="card ">';

                echo '<img src="cover/1 (' . ($n + 1 - $i) . ').webp" class="card-img-top p-3 img"> </img>';

                echo '<div class="card-body">';
                echo '<h5 class="card-title" data-bs-toggle="tooltip" data-bs-html="true" title="'. $bookList[$i]["Title"] .'">' . $bookList[$i]["Title"] . '</h5>';
                echo '<p class="card-text"  data-bs-toggle="tooltip" data-bs-html="true" title="'. $bookList[$i]["Author"] .'">Author : ' . $bookList[$i]["Author"] . ' </p>
                        </div>';
                echo    '<div class="card-footer">
                            <small class="text-muted" >Price : ' . $bookList[$i]['Price'] . ' tk</small>
                        </div>';
                echo '  </div> 
                         </a>';
        }
}

$stmt = null;
$con = null;
