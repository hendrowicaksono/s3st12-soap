<html>
<head><title>ujicoba client web service</title></head>
<body>
<?php
require_once('../lib/nusoap/lib/nusoap.php');
if (!isset($_POST['member_id'])) {
    $_POST['member_id'] = '';
}
$member_id = $_POST['member_id'];

/*-------------- List of Library Member ---------------*/
$mlist = new nusoap_client('http://localhost/sendev-01/s3st12/ws/class/member_list_server.php');
$mlistResponse = $mlist->call('get_MemberList', '');

if ($mlist->fault) {
    echo 'masih ada yg salah';
}

if (is_array($mlistResponse)) {
    echo '<form method="POST" action="'.$_SERVER['PHP_SELF'].'">';
    echo '<select name="member_id">';
    foreach ($mlistResponse as $key => $value) {
        #echo $key.'<br />';
        foreach ($value as $key1 => $value1) {
            #echo $key1.' => '.$value1.'<br />';
            if ($key1 == 'member_id') {
                echo '<option value="'.$value1.'"';
                if ($value1 == $member_id) {
                    echo ' selected';
                }
                echo '>';
            } elseif ($key1 == 'member_name') {
                echo $value1.'</option>';
            }
        }
    }
    echo '</select>';
    echo '<input type="submit" value="Submit">';
    echo '</form>';
} else {
    echo $mlistResponse;
}
/*-----------------------------------------------------*/
/*-------------- Library Member Detail  ---------------*/
if ($member_id != '') {
    echo '<hr />';
    echo '<span style="font-weight: bold;">Detail Data Member</span>';
    $mdetailPars = array('member_id' => $member_id);
    $mdetail = new nusoap_client('http://localhost/sendev-01/s3st12/ws/class/member_detail_server.php');
    $mdetailResponse = $mdetail->call('get_MemberDetail', $mdetailPars);
    if ($mdetail->fault) {
        echo 'masih ada yg salah';
    }
    if (is_array($mdetailResponse)) {
        echo '<table border="1">';
        foreach ($mdetailResponse as $key => $value) {
            echo '<tr>';
            echo '<td>'.$key.'</td><td>&nbsp;'.$value.'</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo $mdetailResponse;
    }
}
/*-----------------------------------------------------*/
/*-------------- Member Current Loan ------------------*/
if ($member_id != '') {
    echo '<hr />';
    echo '<span style="font-weight: bold;">Member Current Loan</span><br />';
    $mcloanPars = array('member_id' => $member_id);
    $mcloan = new nusoap_client('http://localhost/sendev-01/s3st12/ws/class/member_cloan_server.php');
    $mcloanResponse = $mcloan->call('get_MemberCurrentLoan', $mcloanPars);
    if ($mcloan->fault) {
        echo 'masih ada yg salah';
    }
    if (is_array($mcloanResponse)) {
        echo '<table border="1">';
        foreach ($mcloanResponse as $key => $value) {
            #echo $key.'<br />';
            echo '<tr>';
            foreach ($value as $key1 => $value1) {
                echo '<td>'.$key1.'</td><td>'.$value1.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo $mcloanResponse;
    }
}
/*-----------------------------------------------------*/


?>  
</body>
</html>

