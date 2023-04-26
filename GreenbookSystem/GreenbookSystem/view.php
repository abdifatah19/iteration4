<?php
include 'db_conn.php';
$data = array();
$sql = "SELECT *  FROM `discussion` ORDER BY id asc";
$result = $conn->query($sql);
while($row = $result->fetch()){
        array_push($data, $row);
        array_push($data);
}

echo json_encode($data);
$conn = null;
exit();
