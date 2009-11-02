<?php 

require_once ("../../sysconfig.inc.php");

class mysql_base 
{
    protected $sql = '';
    protected $query = '';
    protected $numrows = '';
    protected $result = '';

    function __construct()
    {
        mysql_connect (DB_HOST, DB_USERNAME, DB_PASSWORD);
        mysql_select_db (DB_NAME);
    }

    protected function set_sql($sql)
    {
        $this->sql = $sql;
    }

    protected function run_query()
    {
        $this->query = mysql_query($this->sql);
        $this->numrows = mysql_num_rows($this->query);
    }

    public function get_numrows()
    {
        return $this->numrows;
    }

    protected function set_result()
    {
    }

    public function get_result()
    {
        return $this->result;
    }
}

?>
