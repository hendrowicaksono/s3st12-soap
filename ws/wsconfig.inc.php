<?php

if ((!isset($sectrigger)) OR ($sectrigger != 1)) {
    echo 'Can not access this file directly';
} else {
    /*
    This is only sample of config file for web service in slims.
    Later it could taken from database, not config file
    */
    # choose 'class' if you want to use class-based soap (aka: nusoap),
    # or choose 'extension' if you want to use extension-based
    # soap (build natively in PHP)
    $servermod = 'class';
    $clientmod = 'class';
}

?>

