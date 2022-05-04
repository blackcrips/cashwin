<?php
$con = mysqli_connect("localhost", "root", 123456, "new_aeging");
$result = mysqli_query($con, "SELECT name,contract_no FROM clients_information");

$row = array();
while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}

echo json_encode($rows);
