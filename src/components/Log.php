<?php

class Log{
  public static function logMensagem( $msg, $ip, $type, $file = 'main.log' ){
    $date = date( 'Y-m-d H:i:s' );
    $msg = sprintf( "[%s] [%s] [%s]: %s%s", $date, $ip, $type, $msg, PHP_EOL );
    file_put_contents( $file, $msg, FILE_APPEND );
  }
}
