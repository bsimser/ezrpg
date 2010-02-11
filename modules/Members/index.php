<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_Members
  Shows a list of members.
*/
class Module_Members
{
    /*
      Variable: $db
      Contains the database object.
    */
    private $db;
	
    /*
      Variable: $player
      The currently logged in player. Value is 0 if no user is logged in.
    */
    private $player;
	
    /*
      Function: __construct
      Begins the memebrs list page.
	
      If the user is logged in, it saves the database, smarty and player variables as class variables, then displays the page.
	
      Parameters:
      The parameters are passed by reference so that all modules and other code use the same objects.
	
      $db - An instance of the database class.
      $tpl - A Smarty object.
      $player - A player result set from the database, or 0 if not logged in.
    */
    public function __construct(&$db, &$tpl, &$player=0)
    {
        //Require login
        requireLogin();
        
        $query = $db->execute('SELECT `username`, `level` FROM <ezrpg>players ORDER BY `id` ASC LIMIT 20');
        $members = Array();
        
        while ($m = $db->fetch($query))
        {
            $members[] = $m;
        }
	
        $tpl->assign('members', $members);
        $tpl->display('members.tpl');
    }
}
?>