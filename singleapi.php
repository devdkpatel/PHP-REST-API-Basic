<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data['sid'];

include "config.php";

$select = "SELECT * FROM user WHERE id = {$student_id}";
$result = mysqli_query($con, $select) or die("SQL query failed.");

if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($row);
}else{
	echo json_encode(array('message' => 'No Record found!', 'satus' => false));
}
?>