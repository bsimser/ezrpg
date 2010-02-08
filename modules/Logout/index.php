<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_Logout
  This module clears the session data to logout the user.
*/
class Module_Logout
{
    /*
      Function: __construct
      Clears session data and redirects back to homepage.
	
      Parameters:
      The parameters are passed by reference so that all modules and other code use the same objects.
	
      $db - An instance of the database class.
      $tpl - A Smarty object.
      $player - A player result set from the database, or 0 if not logged in.
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