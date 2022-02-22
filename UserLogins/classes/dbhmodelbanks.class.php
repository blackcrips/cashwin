<?php

$host = "localhost";
$username = "root";
$password = "123456";
$dbname = "cash_win";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}

$sql = "SELECT * FROM bank_accounts";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();

exit(json_encode($result));
