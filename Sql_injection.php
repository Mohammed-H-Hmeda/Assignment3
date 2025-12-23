<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "websec";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $sql = "SELECT * FROM users WHERE username=?";
    $prep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($prep, "s", $username);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    if (mysqli_num_rows($result) > 0) {
        echo "Results found";
    } else {
        echo "No results found";
    }
}
