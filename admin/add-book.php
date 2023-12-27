<?php

include_once "../includes/connect.php";


function addbook($a, $b, $c, $d, $e){
    $sql = "INSERT INTO `books`(`Title`, `Description`, `Author`, `Price`, `Publisher_ID`) 
    VALUES (:title,:d,:author,:price,:pubID)";

    $stmt = $GLOBALS['con']->prepare($sql);
    $stmt->bindParam(':title', $a);
    $stmt->bindParam(':d', $b);
    $stmt->bindParam(':author', $c);
    $stmt->bindParam(':price', $d);
    $stmt->bindParam(':pubID', $e);

    $stmt->execute();

    return true;
} 