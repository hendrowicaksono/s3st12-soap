<?php 

require_once ("mysql_base.inc.php");
require_once ("../../sysconfig.inc.php");

class member_cloan extends mysql_base
{
    function __construct($member_id)
    {
        mysql_base::__construct();
        $this->set_sql("SELECT * FROM loan WHERE member_id='$member_id' AND is_lent='1'");
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
                    'item_code' => $data['item_code'],
                    'loan_date' => $data['loan_date'],
                    'due_date' => $data['due_date']
                );
            }
        }
    }
}

# TEST
#$member = new member_cloan('M00001');
#echo $member->get_result();

?>
