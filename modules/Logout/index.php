<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_Logout
  This module clears the session data to logout the user.
*/
class Module_Logout extends Base_Module
{
    /*
      Function: start
      Clears session data and redirects back to homepage.
    */
    public function __construct(&$db, &$tpl, &$player=0)
    {
        session_unset();
        session_destroy();
		
        $msg = 'You have been logged out!';
        header('Location: index.php?msg=' . urlencode($msg));
        exit;
    }
}
?>