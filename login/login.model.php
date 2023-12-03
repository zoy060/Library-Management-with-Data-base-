<?php
function get_user($con, $username)
{
    $sql = "SELECT username,pass,member_id FROM member WHERE username = :username";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(":username",$username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
