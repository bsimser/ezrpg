<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_Members
  Shows a list of members.
*/
class Module_Members extends Base_Module
{
    /*
      Function: start
      Displays the members list page.
    */
    public function start()
    {
        //Require login
        requireLogin();
        
        $query = $this->db->execute('SELECT `username`, `level` FROM `<ezrpg>players` ORDER BY `id` ASC LIMIT 50');
        $members = Array();
        
        while ($m = $this->db->fetch($query))
        {
            $members[] = $m;
        }
	
        $this->tpl->assign('members', $members);
        $this->tpl->display('members.tpl');
    }
}
?>