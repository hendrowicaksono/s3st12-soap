<?php

require_once ('../../lib/nusoap/lib/nusoap.php');

$server = new nusoap_server;
$server->register('get_MemberList');

function get_MemberList()
{
    require_once ('../core/member_list.inc.php');
    $ml = new member_list;
    $result = $ml->get_result();
    return $result;
}
$server->service($HTTP_RAW_POST_DATA);

?>

