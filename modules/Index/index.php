<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_Index
  A basic module for the default landing page. Just shows the index template or the player's home page.
*/
class Module_Index
{
    /*
      Function: __construct
      Renders  either index.tpl or home.tpl with smarty, depending on if the user is logged in.
    */
    public function __construct(&$db, &$tpl, &$player=0)
    {
        if (LOGGED_IN)
        {
            $tpl->display('home.tpl');
        }
        else
        {
            $tpl->display('index.tpl');
        }
    }
}
?>