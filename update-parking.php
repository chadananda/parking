<?php

ini_set("log_errors", 1);
//ini_set("error_log", "php-error.log");


echo ( "Update started!" );

// Use in the "Post-Receive URLs" section of your GitHub repo.
if ( $_POST['payload'] ) {
  chdir($_SERVER['PHP_SELF']);
  exec('git reset --hard HEAD && git pull');
}