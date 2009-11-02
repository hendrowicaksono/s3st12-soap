<?php 

require_once ("mysql_base.inc.php");
require_once ("../../sysconfig.inc.php");

class member_list extends mysql_base
{
    function __construct()
    {
        mysql_base::__construct();
        $this->set_sql("SELECT * FROM member");
        $this->run_query();
        $this->set_result();
    }

    protected function set_result()
    {
        if ($this->get_numrows() == 0) {
            $this->result = 'No data available!';
        } else {
            while ($data = mysql_fetch_array($this->query)) {
                $this->result[] = array (
                    'member_id' => $data['member_id'],
                    'member_name' => $data['member_name']
                );
            }
        }
    }
}

# TEST
#$member = new member_list;
#$result = $member->get_result();
#foreach ($result as $key => $value) {
    #echo $key.'---'.$value.'<br />';
#    foreach ($value as $key1 => $value1) {
#        echo $key1.'---'.$value1.'<br />';
#    }
#}

?>
