<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: *' );

$data = json_decode( file_get_contents( "php://input" ), true );
$search_value = $data[ 'search' ];

//$search_value = isset($_GET['search']) ? $_GET['search'] : die();

include "config.php";

$search = "SELECT * FROM user WHERE name LIKE '%{$search_value}%'";
$result = mysqli_query( $con, $search )or die( "SQL query failed." );

if ( mysqli_num_rows( $result ) > 0 ) {
    $row = mysqli_fetch_all( $result, MYSQLI_ASSOC );
    echo json_encode( $row );
} else {
    echo json_encode( array( 'message' => 'No Search found!', 'satus' => false ) );
}
?>