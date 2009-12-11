<?php
//Security, it stops all lib and module files from being directly viewed in the browser
//Those files must be included instead, and this sets a flag IN_EZRPG for those files to check to make sure
define('IN_EZRPG', true);

require_once('init.php');

if (ctype_alnum($_GET['mod']))
	$module = new Module($db, $tpl, $player, $_GET['mod']);
else
	$module = new Module($db, $tpl, $player);
?>