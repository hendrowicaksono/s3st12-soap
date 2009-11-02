<?php 

require_once ("mysql_base.inc.php");
require_once ("../../sysconfig.inc.php");

class member_detail extends mysql_base
{
    function __construct($member_id)
    {
        mysql_base::__construct();
        $this->set_sql("SELECT * FROM member WHERE member_id='$member_id'");
        $this->run_query();
        $this->set_result();
    }

    protected function set_result()
    {
        if ($this->get_numrows() != 1) {
            $this->result = 'No data available!';
        } else {
            while ($data = mysql_fetch_array($this->query)) {
                $this->result = array (
                    'member_id' => $data['member_id'],
                    'member_name' => $data['member_name'],
                    'gender' => $data['gender'],
                    'birth_date' => $data['birth_date'],
                    'member_type_id' => $data['member_type_id'],
                    'member_address' => $data['member_address'],
                    'member_email' => $data['member_email'],
                    'postal_code' => $data['postal_code'],
                    'inst_name' => $data['inst_name'],
                    'is_new' => $data['is_new'],
                    'member_image' => $data['member_image'],
                    'pin' => $data['pin'],
                    'member_phone' => $data['member_phone'],
                    'member_fax' => $data['member_fax'],
                    'member_since_date' => $data['member_since_date'],
                    'register_date' => $data['register_date'],
                    'expire_date' => $data['expire_date'],
                    'member_notes' => $data['member_notes'],
                    'is_pending' => $data['is_pending'],
                    'mpasswd' => $data['mpasswd'],
                    'last_login' => $data['last_login'],
                    'last_login_ip' => $data['last_login_ip'],
                    'input_date' => $data['input_date'],
                    'last_update' => $data['last_update']
                );
            }
        }
    }

}

# TEST
#$member = new member_detail('M00004');
#echo $member->get_result();
#echo $member->get_query();




?>
