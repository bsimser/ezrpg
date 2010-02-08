<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module
  Loads modules from the modules folder.
*/
class Module
{
    /*
      Function: __construct
      Includes the file /module/$module/index.php then creates a new instance of the class Module_$module.
	
      *Example*: index.php?module=Index
	
      Looks for /modules/Index/index.php, then creates new Module_Index() object.
	
      Parameters:
      $db - An instance of the database object.
      $tpl - An instance of the smarty object.
      $module - Name of the module, defaults to Index.
	
      Returns:
      A new instance of the module class.
	
      Shows the Index module if the specified module cannot be found.
    */
    public function __construct(&$db, &$tpl, &$player, $module='Index')
    {
        if (@include_once(MOD_DIR . '/' . $module . '/index.php'))
        {
            $classname = 'Module_' . $module;
            return new $classname($db, $tpl, $player);
        }
        else
        {
            return new Module($db, $tpl, $player, 'Index');
        }
    }
}
?>