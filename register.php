<?php
$server = "tcp:sqlserver4kn7ps34vbhzw.database.windows.net,1433";
$database = "sampledb";
$username = "sqladmin";
$password = "P@ssw0rd";
$connectionOptions = array(
    "Database" => $database,
    "Uid" => $username,
    "PWD" => $password,
    "Encrypt" => true
);

$conn = sqlsrv_connect($server, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$name = $_POST['student_name'];
$email = $_POST['email'];
$student_id = $_POST['student_id'];

$sql = "INSERT INTO Students (StudentName, Email, StudentID) VALUES (?, ?, ?)";
$params = array($name, $email, $student_id);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Registration successful!";
}

sqlsrv_close($conn);
?>
