<?php

ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");


error_log( "Update started!" );

// Use in the "Post-Receive URLs" section of your GitHub repo.

if ( $_POST['payload'] ) {
  shell_exec( 'cd /var/www/html/ && git reset --hard HEAD && git pull' );
}