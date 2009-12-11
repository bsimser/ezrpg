<?php
function addError($msg, $player, &$db)
{
	$insert['player'] = $player;
	$insert['msg'] = $msg;
	$appState = array($_REQUEST, $_SERVER);
	$insert['data'] = serialize($appState);
	$insert['time'] = time();
	$query = $db->autoexecute('error_log', $insert, 'INSERT');
	
	return $query;
}
?>