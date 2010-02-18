<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: ModuleFactory
  Factory class for modules.
*/
class ModuleFactory
{
    /*
      Function: factory
      A factory class for creating module objects.
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
      
      Example Usage:
      > $new_module = ModuleFactory::factory($db, $tpl, $player);
      > $new_module->start();
    */
    public static function factory(&$db, &$tpl, &$player, $module='Index')
    {
        if (file_exists (MOD_DIR . '/' . $module . '/index.php'))
        {
            include_once (MOD_DIR . '/' . $module . '/index.php');
            $classname = 'Module_' . $module;
            return new $classname($db, $tpl, $player);
        }
        else
        {
            // Default module to display (the home page)
            include_once (MOD_DIR . '/Index/index.php');
            return new Module_Index($db, $tpl, $player);
        }
    }
}
?>