
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Status</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message-box {
            background: #ffffff;
            padding: 30px 50px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .success {
            color: #2e7d32;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .success-icon {
            font-size: 28px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <div class="success">
            ✅ Registration Successful!
        </div>
    </div>
</body>
</html>

<?php
$server = "tcp:sqlserver4kn7ps34vbhzw.database.windows.net,1433";
$database = "sampledb";
$username = "sqladmin";
$password = "P@ssw0rd";

try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $studentid = $_POST['studentid'];

    $sql = "INSERT INTO Students (StudentName, Email, StudentID) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $studentid]);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
