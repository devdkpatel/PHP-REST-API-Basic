<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methos: POST' );
header( 'Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methos, Access-Control-Allow-Headers, Authorization, X-Requested-With' );

$data = json_decode( file_get_contents( "php://input" ), true );

$student_name = $data[ 'name' ];
$student_age = $data[ 'age' ];
$student_email = $data[ 'email' ];

include "config.php";

$insert = "INSERT INTO user (name, age, email) VALUES ('{$student_name}', '{$student_age}', '{$student_email}')";

if ( mysqli_query( $con, $insert ) ) {
    echo json_encode( array( 'message' => 'Data inserted successfully.', 'satus' => true ) );
} else {
    echo json_encode( array( 'message' => 'somthing wrong!', 'satus' => false ) );
}
?>