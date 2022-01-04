<?php
echo "kurcina";

if (isset($_POST["submit"])){
    $pollname = $_POST["pollname"];
    $option1 = $_POST["option1"];
    $option2 = $_POST["option2"];
    $option3 = $_POST["option3"];
    $option4 = $_POST["option4"];

    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "polls";
    $connect = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

    $sql = "INSERT INTO allpolls (poll_name, option1, option2, option3, option4, option1_votes, option2_votes, option3_votes, option4_votes) VALUES (?,?,?,?,?,0,0,0,0);";
    $statement = mysqli_stmt_init($connect);


    if(!mysqli_stmt_prepare($statement,$sql)){
        header("Location: ./Index.html#statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement,"sssss",$pollname,$option1, $option2,$option3, $option4);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    header("Location: ../public/Index.html");
    exit();

}

