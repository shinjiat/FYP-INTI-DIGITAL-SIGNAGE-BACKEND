<?php
$host = 'mysql.hostinger.my';
$username = 'u559668083_inti';
$password = 'Onlyhostinger';
$database = 'u559668083_inti';
$port = 3306;
$dbconfig = mysqli_connect($host,$username,$password,$database,$port) or die("cannot create database connection");

   function get_result( $Statement ) {
        $RESULT = array();
        $Statement->store_result();
        for ( $i = 0; $i < $Statement->num_rows; $i++ ) {
            $Metadata = $Statement->result_metadata();
            $PARAMS = array();
            while ( $Field = $Metadata->fetch_field() ) {
                $PARAMS[] = &$RESULT[ $i ][ $Field->name ];
            }
            call_user_func_array( array( $Statement, 'bind_result' ), $PARAMS );
            $Statement->fetch();
        }
        return $RESULT;
    }
?>