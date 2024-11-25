<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methos: PUT' );
header( 'Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methos, Access-Control-Allow-Headers, Authorization, X-Requested-With' );

$data = json_decode( file_get_contents( "php://input" ), true );

$student_id = $data[ 'id' ];
$student_name = $data[ 'name' ];
$student_age = $data[ 'age' ];
$student_email = $data[ 'email' ];

include "config.php";

$update = "UPDATE user SET name = '{$student_name}', age = '{$student_age}', email = '{$student_email}' WHERE id = '{$student_id}'";

if ( mysqli_query( $con, $update ) ) {
    echo json_encode( array( 'message' => 'Data Updated.', 'satus' => true ) );
} else {
    echo json_encode( array( 'message' => 'somthing wrong!', 'satus' => false ) );
}
?>