<html>
<head><title>ujicoba client web service</title></head>
<body>
<?php
require_once('../../lib/nusoap/lib/nusoap.php');

$member_id = $_GET['member_id'];
$params = array('member_id' => $member_id);

$client = new nusoap_client('http://localhost/sendev-01/s3st12/ws/class/member_detail_server.php');
$response = $client->call('get_MemberDetail', $params);

if ($client->fault) {
    echo 'masih ada yg salah';
}

if (is_array($response)) {
    foreach ($response as $key => $value) {
        echo $key.' => '.$value.'<br />';
    }
} else {
    echo $response;
}
?>  
</body>
</html>

