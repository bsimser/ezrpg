<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
Class: Module_Skeleton
This is a skeleton module, which can be used as the starting point for coding new modules.
*/
class Module_Skeleton
{
	/*
	Variable: $db
	Contains the database object.
	*/
	private $db;
	
	/*
	Variable: $tpl
	The smarty object.
	*/
	private $tpl;
	
	/*
	Variable: $player
	The currently logged in player. Value is 0 if no user is logged in.
	*/
	private $player;
	
	/*
	Function: __construct
	A description of what this function does.
	
	Parameters:
	The parameters are passed by reference so that all modules and other code use the same objects.
	
	$db - An instance of the database class.
	$tpl - A Smarty object.
	$player - A player result set from the database, or 0 if not logged in.
	*/
	public function __construct(&$db, &$tpl, &$player=0)
	{
		//If your module does not need the player to be logged in, you can remove this requireLogin() function call.
		requireLogin();
		
		//Save the variables to the class so they can be used in other class methods.
		$this->db = $db;
		$this->tpl = $tpl;
		$this->player = $player;
	}
}
?>