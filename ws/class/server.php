<?php

require_once ('../../lib/nusoap/lib/nusoap.php');
$server = new nusoap_server;
$server->register('salam');

function salam($nama)
{
    if ($nama == '') {
        return new nusoap_fault('Client', '', 'harus suplai dengan valid string');
    } else {
        $result = 'Halo '.$nama;
        return $result;
    }
}
$server->service($HTTP_RAW_POST_DATA);

?>

