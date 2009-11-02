<?php

require_once ('../../lib/nusoap/lib/nusoap.php');

$server = new nusoap_server;
$server->register('get_MemberCurrentLoan');

function get_MemberCurrentLoan($member_id)
{
    if ($member_id == '') {
        return new nusoap_fault('Client', '', 'harus suplai dengan valid string');
    } else {
        require_once ('../core/member_cloan.inc.php');

        $mcl = new member_cloan($member_id);
        $result = $mcl->get_result();
        return $result;
    }
}
$server->service($HTTP_RAW_POST_DATA);

?>

