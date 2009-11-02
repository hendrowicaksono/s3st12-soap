<html>
<head><title>ujicoba client web service</title></head>
<body>
<?php
require_once('../../lib/nusoap/lib/nusoap.php');

#$member_id = $_GET['member_id'];
#$params = array('member_id' => $member_id);
$params = NULL;

$client = new nusoap_client('http://localhost/sendev-01/s3st12/ws/class/member_list_server.php');
$response = $client->call('get_MemberList', '');

if ($client->fault) {
    echo 'masih ada yg salah';
}

if (is_array($response)) {
    foreach ($response as $key => $value) {
        echo $key.'<br />';
        foreach ($value as $key1 => $value1) {
            echo $key1.' => '.$value1.'<br />';
        }
    }
} else {
    echo $response;
}

?>  
</body>
</html>

