<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
Class: Module_City
This is a very simple module, designed to simply display a static template page.
*/
class Module_City
{
	/*
	Function: __construct
	Displays the city.tpl template. That's all!
	
	Parameters:
	The parameters are passed by reference so that all modules and other code use the same objects.
	
	$db - An instance of the database class.
	$tpl - A Smarty object.
	$player - A player result set from the database, or 0 if not logged in.
	*/
	public function __construct(&$db, &$tpl, &$player=0)
	{
		//Require the user to be logged in
		requireLogin();
		
		$tpl->display('city.tpl');
	}
}
?>