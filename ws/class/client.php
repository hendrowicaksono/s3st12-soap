<html>
<head><title>ujicoba client web service</title></head>
<body>
<?php
require_once('../../lib/nusoap/lib/nusoap.php');

$nama = $_GET['nama'];
$params = array('nama' => $nama);

#$client = new soapclient('http://localhost/latihan-soap/server.php');
$client = new nusoap_client('http://localhost/sendev-01/s3st12/ws/class/server.php');
#$response = $client->call('salam', array('nama' => 'hendro'));
$response = $client->call('salam', $params);

if ($client->fault) {
    echo 'masih ada yg salah';
}

echo $response;
#echo '<h1>test</h1>';
?>  
</body>
</html>

