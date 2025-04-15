
<?php
$server = "tcp:sqlserver4kn7ps34vbhzw.database.windows.net,1433";
$database = "sampledb";
$username = "sqladmin"; // Change this
$password = "YourPasswordHere"; // Change this

try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $studentid = $_POST['studentid'];

    $sql = "INSERT INTO Students (StudentName, Email, StudentID) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $studentid]);

    echo "<h2>✅ Registration Successful!</h2>";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
