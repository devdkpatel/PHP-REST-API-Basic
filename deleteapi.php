<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methos: DELETE' );
header( 'Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methos, Access-Control-Allow-Headers, Authorization, X-Requested-With' );

$data = json_decode( file_get_contents( "php://input" ), true );

$student_id = $data[ 'id' ];

include "config.php";

$delete = "DELETE FROM user WHERE id = {$student_id}";

if ( mysqli_query( $con, $delete ) ) {
    echo json_encode( array( 'message' => 'Data deleted.', 'satus' => true ) );
} else {
    echo json_encode( array( 'message' => 'Something wrong!', 'satus' => false ) );
}
?>