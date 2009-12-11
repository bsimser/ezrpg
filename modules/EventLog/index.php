<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
Class: Module_EventLog
The module is the player's event log, which keeps track of everything that happens to the user.
*/
class Module_EventLog
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
	Grabs the log data, assigns it to the template and displays the page.
	
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
		
		if ($_GET['act'] == 'clear')
		{
			$this->db = $db;
			//$this->tpl = $tpl; #Not used in clear()
			$this->player = $player;

			$this->clear();
		}
		else
		{
			//Retrieve all log messages
			$query = $db->execute('SELECT time, message, status FROM <ezrpg>player_log WHERE player=? ORDER BY time DESC LIMIT 10', array($player->id));
			$logs = Array();
			if ($db->numRows($query) > 0)
			{
				while($l = $db->fetch($query))
				{
					$logs[] = $l;
				}
			}

			//Update log message statuses to old/read (status value: 1)
			$db->execute('UPDATE <ezrpg>player_log SET status=1 WHERE player=?', array($player->id));

			$tpl->assign('logs', $logs);
			$tpl->display('log.tpl');
		}
	}
	
	/*
	Function: clear
	Deletes all log entries belonging to the player.
	*/
	private function clear()
	{
		$query = $this->db->execute('DELETE FROM <ezrpg>player_log WHERE player=?', array($this->player->id));
		
		$msg = 'You have cleared your event log!';
		header('Location: index.php?mod=EventLog&msg=' . urlencode($msg));
		exit;
	}
}
?>