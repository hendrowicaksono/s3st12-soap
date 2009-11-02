<?php

require_once ('../../lib/nusoap/lib/nusoap.php');

$server = new nusoap_server;
$server->register('get_MemberDetail');

function get_MemberDetail($member_id)
{
    if ($member_id == '') {
        return new nusoap_fault('Client', '', 'harus suplai dengan valid string');
    } else {
        require_once ('../core/member_detail.inc.php');

        $md = new member_detail($member_id);
        #echo $member->get_result();
        $result = $md->get_result();
        return $result;
    }
}
$server->service($HTTP_RAW_POST_DATA);

?>

