<?php

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "polls";
$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if(isset ($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM allpolls WHERE id = '$id';";
    $statement = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($statement, $sql)){
        header("Location: ../public/Index.html#statementfailed");
        exit();
    }

    $result = mysqli_query($conn, $sql);
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)){
        array_push($arr, $row);
    }
    echo json_encode($arr);

}
else {
    echo "The name param is NOT received!";
}



